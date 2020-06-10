<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\PayPalRequest;
use App\Models\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use PayPal\Exception\PayPalConnectionException;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    private $api_context;

    public function __construct()
    {
        $this->api_context = new ApiContext(
            new OAuthTokenCredential(config('paypal.client_id'), config('paypal.secret'))
        );
        $this->api_context->setConfig(config('paypal.settings'));
    }

    public function index()
    {
        $total_price = str_replace(',', '', Cart::total(ZERO, THREE));
        $total_price_usd = round($total_price / CURRENCY, TWO);
        return view('home.payment', compact('total_price_usd'));
    }


    public function createPayment(PayPalRequest $request)
    {
        $pay_amount = $request->amount;
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item = new Item();
        $item->setName('Paypal Payment')->setCurrency('USD')->setQuantity(ONE)->setPrice($pay_amount);
        $itemList = new ItemList();
        $itemList->setItems(array($item));
        $amount = new Amount();
        $amount->setCurrency('USD')->setTotal($pay_amount);
        $transaction = new Transaction();
        $transaction->setAmount($amount)->setItemList($itemList)
            ->setDescription('Laravel Paypal Payment Tutorial');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(route('confirm-payment'))
            ->setCancelUrl(url()->current());
        $payment = new Payment();
        $payment->setIntent('Sale')->setPayer($payer)->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($this->api_context);
        } catch (PayPalConnectionException $ex) {
            return redirect()->route('checkout')->with('error', __('messages.some-error-occur'));
        } catch (Exception $ex) {
            return redirect()->route('checkout')->with('error', __('messages.some-error-occur'));
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        if (isset($redirect_url)) {
            return redirect($redirect_url);
        }
        return redirect()->route('checkout')->with('error', __('messages.unknown-error-occurred'));
    }

    public function confirmPayment(Request $request)
    {
        try {
            $price_pay_pal = Session::getSessionDiscount()['money_paid'] + str_replace(',', '', Cart::total(ZERO, THREE));

            session([md5('totalPricePayPal') => $price_pay_pal]);

            if (empty($request->query('paymentId')) || empty($request->query('PayerID')) || empty($request->query('token')))
                return redirect()->route('checkout')->with('error', __('messages.payment-was-not-successful'));
            $payment = Payment::get($request->query('paymentId'), $this->api_context);
            $execution = new PaymentExecution();
            $execution->setPayerId($request->query('PayerID'));
            $result = $payment->execute($execution, $this->api_context);
            if ($result->getState() != 'approved')
                return redirect()->route('checkout')->with('error', __('messages.payment-was-not-successful'));
            return redirect()->route('checkout')->with('success', __('messages.payment-made-successfully'));
        } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
    }
}
