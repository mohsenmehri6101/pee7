<?php

/**
 * @param $routeName
 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\UrlGenerator|string
 */
function urlCustom($routeName){

    $level=auth()->user()->level;
    return url($level.'/'.$routeName);
}


/**
 * @param \Illuminate\Http\Request $request
 * @return array
 */
function makeInputs(Illuminate\Http\Request $request): array
{
    return $request->except('_token');
}

/**
 * @return null
 */
function giveIdUserLoggedIn(){
    return auth()->user()->id ?? null;
}

# form add class is-invalid on input
function isValidOrNot($errors,$field): ?string
{
    return $errors->first($field) ? 'is-invalid' : null;
}

# form show error

/**
 * @param $errors
 * @param $field
 * @param null $idInput
 * @return mixed
 */
function showMessageError($errors, $field, $idInput=null){
    $idInput=$idInput??$field;
    return $errors->first($field, "<span id='error_input_$idInput' class='text-red invalid-feedback' >:message</span>");
}


/**
 * @param $message
 * @param $phone
 * @return bool
 */
function sendMessagePhone(string $message,string $phone): bool
{
    # check inputs
    $phone=strval($phone);
    return App\Http\Controllers\Tools\Notice\SMS::fire($message,$phone);
}

/**
 * @param $message
 * @param $email
 * @return bool
 */
function sendEmail($message, $email): bool
{
    # check inputs
    return App\Http\Controllers\Tools\Notice\MAIL::fire($message,$email);
}
