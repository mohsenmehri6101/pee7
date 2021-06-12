class validation{

    constructor(idForm,validationsAndInputs){
        /* define variables */
        this.inputs = Object.keys(validationsAndInputs)
        this.validations = Object.values(validationsAndInputs)
        this.form = document.getElementById(idForm)
        this.erorrs = this.defaultErrors()
        this.settingShowErrors=this.defaultSettingShowErrors()
        this.attributes=this.defaultAttributes()
        /* define variables */

        /* define listener for every thing change in form */
        this.listenerForm()
        /* define listener for every thing change in form */
    }

    listenerForm(){
        this.form.addEventListener('keyup',event=>{
            /*console.log("keyup")*/
            this.run() ? this.stopSendForm(this.form) : this.allowSendForm(this.form);
        });
    }

    stopSubmit(evt) {
        event.preventDefault();
    }

    stopSendForm(form) {
        form.addEventListener("submit", this.stopSubmit);
    }

    allowSendForm(form) {
        form.removeEventListener("submit", this.stopSubmit);
    }

    defaultErrors(){
        return {
            'required':'پر کردن  فیلد attribute اجباری است',
            'email':'آدرس ایمیل معتبر نیست',
            'phone':'شماره همراه معتبر نیست',
            'numeric':'ورودی باید فقط شامل عدد باشد',
            'min':'طول attribute نباید کوچکتر از value باشد.',
            'max':'طول attribute نباید بیشتر از value باشد.',
            'password':'attribute type',
            'confirmed':'attribute با تاییدیه مطابقت ندارد.',
            'string':'فیلد attribute باید کاراکتر باشد',
            'required_without':'attribute الزامی است زمانی که value موجود نیست.',
            'char_just':'کاراکترهای ورودی فقط باید شامل حروف value باشند.',
        }
    }

    defaultAttributes(){
        return {
            "name" : "نام",
            "username" : "نام کاربری",
            "email" : "پست الکترونیکی",
            "first_name" : "نام",
            "last_name" : "نام خانوادگی",
            "password" : "رمز عبور",
            "password_confirmation" : "تاییدیه ی رمز عبور",
            "city" : "شهر",
            "country" : "کشور",
            "address" : "نشانی",
            "phone" : "تلفن",
            "mobile" : "تلفن همراه",
            "age" : "سن",
            "sex" : "جنسیت",
            "gender" : "جنسیت",
            "day" : "روز",
            "month" : "ماه",
            "year" : "سال",
            "hour" : "ساعت",
            "minute" : "دقیقه",
            "second" : "ثانیه",
            "title" : "عنوان",
            "text" : "متن",
            "content" : "محتوا",
            "description" : "توضیحات",
            "excerpt" : "گلچین کردن",
            "date" : "تاریخ",
            "time" : "زمان",
            "available" : "موجود",
            "size" : "اندازه",
            "body" : "متن",
            "comment" : "کامنت",
            "category":"دسته بندی",
            "g-recaptcha-response":"من روبات نیستم",
            "terms":"قوانین و سیاست های سایت",
            "self_id":"شماره ملی",
            "image":"تصویر",
            "past_password":"رمز ورود قبلی",
            "id_company":"شناسه شرکت",
            "id_recording":"شماره ثبت",
            "plate":"پلاک پستی",
            "mobiles":"شماره موبایل",
            "phones":"شماره تلفن",
            "Regards":"با احترام",
            "Hello!":"سلام",
            "permissions":"سطح دسترسی ها",
            "confirm":"کد تایید",
            "permission":"سطح دسترسی"
        }
    }

    getValueInput(input){
        for (let inputObject of this.form) {
            if(inputObject.name === input) {
                return inputObject.value;
            }
        }
        return null;
    }

    defaultSettingShowErrors(){
        return {
            "value":"",
            "listClassWhenHaveError":["text-red", "invalid-feedback"],
            "elementForShowError":"SPAN",
            "listClassInputWhenHaveError":["is-invalid"],
            "listClassInputWhenOk":["is-valid"],
        }
    }

    createStringEval(rule,functionName,valueInput){
        let list=rule.split(':');
        return list.length==1 ? "this."+list[0]+"('"+valueInput+"')" :  "this."+list[0]+"('"+valueInput+"','"+list[1]+"')";
    }

    run(){
        let errorIsOrNot=false;
        this.inputs.forEach((input,index) =>
        {
            // get value input
            let valueInput=this.getValueInput(input);
            // get functions name
            let rules=this.validations[index].split('|');
            // check input and run functions validation validations ['required','email','numeric',....]
            let forEnd=true;
            for(let rule of rules)
            {
                // this.settingShowErrors=this.defaultSettingShowErrors()
                let functionName=rule.split(':')[0];
                let stringEval=this.createStringEval(rule,functionName,valueInput);
                if(! eval(stringEval))
                {
                    forEnd=false;
                    errorIsOrNot=true;
                    this.showError(input,functionName);
                    break;
                }
            }
            if(forEnd){
                this.deleteShowError(input);
            }
        });
        return errorIsOrNot;
    }

    getIdElement(input){
        return `error_input_${input}`;
    }

    deleteShowError(input)
    {
       let idElement=this.getIdElement(input);
       if(document.getElementById(idElement))
       {
           let element = document.getElementById(idElement);
           element.remove()
           let selfInput=document.getElementsByName(input)[0];
           selfInput.classList.add(...this.settingShowErrors['listClassInputWhenOk'])
           selfInput.classList.remove(...this.settingShowErrors['listClassInputWhenHaveError']);
       }
    }

    createTextError(input,functionName){
        let textError=this.erorrs[functionName];
        textError=textError.replace("value",this.settingShowErrors['value'])
        textError=textError.replace("attribute",this.attributes[input]??'')
        return textError
    }

    showError(input,functionName)
    {
       let idElement=this.getIdElement(input);
       if(!document.getElementById(idElement))
       {
           // create span
           let element = document.createElement(this.settingShowErrors['elementForShowError']);
           // set id
           element.setAttribute('id',idElement);
           // set text
           element.textContent=this.createTextError(input,functionName);
           // add class
           element.classList.add(...this.settingShowErrors['listClassWhenHaveError']);
           let selfInput=document.getElementsByName(input)[0];
           selfInput.classList.add(...this.settingShowErrors['listClassInputWhenHaveError']);
           // append element after input
           selfInput.parentNode.insertBefore(element, selfInput.nextSibling);
       }
       else
       {
           let element = document.getElementById(idElement);
           element.textContent=this.createTextError(input,functionName);
       }
    }

    numeric(input){
        return !isNaN(input) || !this.required(input);
    }

    required(input){
        return !!input;
    }

    email(input){
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(input).toLowerCase()) || !this.required(input);
    }

    phone(input){
        const re = /^(?:0|98|\+98|\+980|0098|098|00980)?(9\d{9})$/;
        return re.test(String(input).toLowerCase()) || !this.required(input);
    }

    scorePassword(pass){
        let score = 0;
        if (!pass)
            return score;

        // award every unique letter until 5 repetitions
        let letters = new Object();
        for (let i=0; i<pass.length; i++) {
            letters[pass[i]] = (letters[pass[i]] || 0) + 1;
            score += 5.0 / letters[pass[i]];
        }

        // bonus points for mixing it up
        let variations = {
            digits: /\d/.test(pass),
            lower: /[a-z]/.test(pass),
            upper: /[A-Z]/.test(pass),
            nonWords: /\W/.test(pass),
        }

        let variationCount = 0;
        for (let check in variations) {
            variationCount += (variations[check] == true) ? 1 : 0;
        }
        score += (variationCount - 1) * 10;

        return parseInt(score);
    }

    min(input,min){
        this.settingShowErrors["value"]=min;
        return input.length >= min || !this.required(input);;
    }

    max(input,max){
        this.settingShowErrors["value"]=max;
        return input.length <= max || !this.required(input);
    }

    string(input){
        return typeof input == 'string' || !this.required(input);
    }

    password(input){
        let score = this.scorePassword(input);
        this.erorrs['password']=this.defaultErrors()['password'];
        if (score > 80) {
            return true
        }
        if (score > 60) {
            this.erorrs['password']=this.erorrs['password'].replace("type","خوب")
            return true;
        }
        if (score >= 30) {
            this.erorrs['password']=this.erorrs['password'].replace("type","ضعیف")
        }
        if (score <= 30) {
            this.erorrs['password']=this.erorrs['password'].replace("type"," خیلی ضعیف")
        }
        return false;
    }

    confirmed(input,field){
        return input===this.getValueInput(field) || !this.required(input);
    }

    required_without(input,field){
        this.settingShowErrors["value"]=this.attributes[field];
        return  this.required(this.getValueInput(field)) || this.required(input);
    }

    char_just(input,lang){
        this.settingShowErrors["value"]= lang==="en" ? "انگلیسی" : "فارسی";
        const en = /[A-Za-z ]/g;
        const fa= /^[\u0600-\u06FF\s]+$/;
        if(lang=="en")
                return en.test(String(input).toLowerCase()) || !this.required(input);
        else if (lang=="fa")
                return fa.test(String(input).toLowerCase()) || !this.required(input);
        return true;
    }
}
