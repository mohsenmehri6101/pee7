// showProduct
showProduct=function(tthis)
{
    let string_=(tthis.parent()).parent().attr('id');
    let idProduct=string_.slice(0,string_.indexOf("_"));
    let link_page=window.location.href;
    let editLink=link_page+'/show/'+idProduct;
    //window.open(editLink, "_self");
    window.open(editLink, "");
};
// showProduct
// EditButtonProduct
editProduct=function(tthis)
{
    let string_=(tthis.parent()).parent().attr('id');
    let idProduct=string_.slice(0,string_.indexOf("_"));
    let link_page=window.location.href;
    let editLink=link_page+'/edit/'+idProduct;
    window.open(editLink, "_self");
};
// EditButtonProduct
// DeleteButton
deleteProduct=function(this_)
{
    swal({
        title: 'آیا مطمئن هستید؟',
        icon: 'warning',
        buttons: ["لغو", "حذف شود"],
    }).then(function(value) {
        if (value) {
            let string_=(this_.parent()).parent().attr('id');
            let id=string_.slice(0,string_.indexOf("_"));
            // get token
            let csrf_token=$('meta[name="csrf-token"]').attr('content');
            //get url
            let link_page=window.location.href;
            let url=link_page+'/destroy/'+id;
            //create form
            let form = document.createElement("form");
            //set attributes method
            form.setAttribute('method','POST');
            //set attributes url
            form.setAttribute('action',url);
            //set attributes input by value="delete"
            let hiddenField1 = document.createElement('input');
            hiddenField1.setAttribute('name','_method');
            hiddenField1.setAttribute('value','DELETE');
            form.appendChild(hiddenField1);
            //set attributes input by id="id"
            let Field1 = document.createElement('input');
            Field1.setAttribute('name','id');
            Field1.setAttribute('value',id);
            form.appendChild(Field1);
            //set attributes csrf_token
            let hiddenField2 = document.createElement('input');
            hiddenField2.setAttribute('name','_token');
            hiddenField2.setAttribute('value',csrf_token);
            form.appendChild(hiddenField2);
            document.body.appendChild(form);
            form.submit();
        }
    });
    //get id
};
// DeleteButton