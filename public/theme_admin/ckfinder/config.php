<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
ini_set('display_errors', 0);
$config = array();
$config['authentication'] = function () {
    if (empty($_SESSION['admin_id']))
    {
    return true;
}
else
{
    return false;
}
};
$config['licenseName'] = '';
$config['licenseKey']  = '';
$config['privateDir'] = array(
    'backend' => 'default',
    'tags'   => '.ckfinder/tags',
    'logs'   => '.ckfinder/logs',
    'cache'  => '.ckfinder/cache',
    'thumbs' => '.ckfinder/cache/thumbs',
);
$config['images'] = array(
    'maxWidth'  => 150,
    'maxHeight' => 200,
    'quality'   => 80,
    'sizes' => array(
        'small'  => array('width' => 50, 'height' => 60, 'quality' => 80),
        'medium' => array('width' => 100, 'height' => 140, 'quality' => 80),
        'large'  => array('width' => 150, 'height' => 200, 'quality' => 80)
    )
);
$config['backends'][] = array(
    'name'         => 'default',
    'adapter'      => 'local',
    'baseUrl'      => '/userfiles',
    'chmodFiles'   => 0777,
    'chmodFolders' => 0755,
    'filesystemEncoding' => 'UTF-8',
);
$config['defaultResourceTypes'] = '';
$config['resourceTypes'][] = array(
    'name'              => 'Files',
    'directory'         => 'files',
    'maxSize'           => 0,
    'allowedExtensions' => '7z,aiff,asf,avi,bmp,csv,doc,docx,fla,flv,gif,gz,gzip,jpeg,jpg,mid,mov,mp3,mp4,mpc,mpeg,mpg,ods,odt,pdf,png,ppt,pptx,pxd,qt,ram,rar,rm,rmi,rmvb,rtf,sdc,sitd,swf,sxc,sxw,tar,tgz,tif,tiff,txt,vsd,wav,wma,wmv,xls,xlsx,zip',
    'deniedExtensions'  => '',
    'backend'           => 'default'
);
$config['resourceTypes'][] = array(
    'name'              => 'Images',
    'directory'         => 'images',
    'maxSize'           => 0,
    'allowedExtensions' => 'bmp,gif,jpeg,jpg,png',
    'deniedExtensions'  => '',
    'backend'           => 'default'
);
$config['roleSessionVar'] = 'CKFinder_UserRole';
$config['accessControl'][] = array(
    'role'                => '*',
    'resourceType'        => '*',
    'folder'              => '/',
    'FOLDER_VIEW'         => true,
    'FOLDER_CREATE'       => true,
    'FOLDER_RENAME'       => true,
    'FOLDER_DELETE'       => true,
    'FILE_VIEW'           => true,
    'FILE_CREATE'         => true,
    'FILE_RENAME'         => true,
    'FILE_DELETE'         => true,
    'IMAGE_RESIZE'        => true,
    'IMAGE_RESIZE_CUSTOM' => true
);
$config['overwriteOnUpload'] = false;
$config['checkDoubleExtension'] = true;
$config['disallowUnsafeCharacters'] = false;
$config['secureImageUploads'] = true;
$config['checkSizeAfterScaling'] = true;
$config['htmlExtensions'] = array('html', 'htm', 'xml', 'js');
$config['hideFolders'] = array('.*', 'CVS', '__thumbs');
$config['hideFiles'] = array('.*');
$config['forceAscii'] = false;
$config['xSendfile'] = false;
$config['debug'] = false;
$config['pluginsDirectory'] = __DIR__ . '/plugins';
$config['plugins'] = array();
$config['cache'] = array(
    'imagePreview' => 24 * 3600,
    'thumbnails'   => 24 * 3600 * 365,
    'proxyCommand' => 0
);
$config['tempDirectory'] = sys_get_temp_dir();
$config['sessionWriteClose'] = true;
$config['csrfProtection'] = true;
$config['headers'] = array();
return $config;
?>
