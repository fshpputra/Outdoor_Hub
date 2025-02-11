<?php if (!defined("BASEPATH")) exit("No direct script access allowed");

function onlyImage()
{
    $file = $_FILES['image']['tmp_name'];
    $image_type = exif_imagetype($file);;

    if ($image_type !== IMAGETYPE_JPEG && $image_type !== IMAGETYPE_PNG && $image_type !== IMAGETYPE_JPEG) {
        return false;
    } else {
        return true;
    }
}

function max_file_size()
{
    $ci = &get_instance();
    $max_file_size = 1 * 1024 * 1024; //1MB
    if (!empty($_FILES["image"]["name"])) {
        $validation = onlyImage();
        if($validation)
        {
            if ($_FILES['image']['size'] > $max_file_size) {
                $ci->form_validation->set_rules('image', 'image', 'trim|required', [
                    'required' => 'Image is too large, maximum 1MB'
                ]);
                return false;
            } else {
                return true;
            }
        }else{
            $ci->form_validation->set_rules('image', 'image', 'trim|required',[
                'required' => 'Format not allowed'
            ]);
            return false;
        }
        
    }else{
        return true;
    }
    
}

function requiredFile()
{
    $ci = &get_instance();
    if (!empty($_FILES["image"]["name"])) {
        $validation = onlyImage();
        if($validation)
        {
            return true;
        }else{
            $ci->form_validation->set_rules('image', 'image', 'trim|required',[
                'required' => 'Format not allowed'
            ]);
            return false;
        }
    } else {
        $ci->form_validation->set_rules('image', 'image', 'trim|required');
        return false;
    }
}


function validationImage()
{
    $requiredImage = requiredFile();
    if($requiredImage){
        $sizeImage = max_file_size();
        if($sizeImage){
            return true;
        }else{ 
            return false;
        }
    }else{
        return false;
    }
}









function onlyImageMulty($data)
{
    $file = $_FILES[$data]['tmp_name'];
    $image_type = exif_imagetype($file);;

    if ($image_type !== IMAGETYPE_JPEG && $image_type !== IMAGETYPE_PNG && $image_type !== IMAGETYPE_JPEG) {
        return false;
    } else {
        return true;
    }
}

function max_file_size_multy($data)
{
    $ci = &get_instance();
    $max_file_size = 1 * 1024 * 1024; //1MB
    if (!empty($_FILES[$data]["name"])) {
        $validation = onlyImageMulty($data);
        if($validation)
        {
            if ($_FILES[$data]['size'] > $max_file_size) {
                $ci->form_validation->set_rules($data, 'image', 'trim|required', [
                    'required' => 'Image is too large, maximum 1MB'
                ]);
                return false;
            } else {
                return true;
            }
        }else{
            $ci->form_validation->set_rules($data, 'image', 'trim|required',[
                'required' => 'Format not allowed'
            ]);
            return false;
        }
        
    }else{
        return true;
    }
    
}


function requiredFileMulty($data)
{
    $ci = &get_instance();
    if (!empty($_FILES[$data]["name"])) {
        $validation = onlyImageMulty($data);
        if($validation)
        {
            return true;
        }else{
            $ci->form_validation->set_rules($data, 'image', 'trim|required',[
                'required' => 'Format not allowed'
            ]);
            return false;
        }
    } else {
        $ci->form_validation->set_rules($data, 'image', 'trim|required');
        return false;
    }
}


function validationImageMulty($data)
{
    $requiredImage = requiredFileMulty($data);
    if($requiredImage){
        $sizeImage = max_file_size_multy($data);
        if($sizeImage){
            return true;
        }else{ 
            return false;
        }
    }else{
        return false;
    }
}