
// Items
const addItem = document.getElementById('add-item');
const itemContainer = document.getElementById('items-container');
const salesForm = document.getElementById('xpeed-form');
const AlertContainer = document.getElementById('alert-container');


addItem.addEventListener('click', (evt) => {
    evt.preventDefault();
    let html = `<div class="form-group row pt-2">
                    <div class="col-sm-11">
                        <input type="text"  maxlength="20" data-parsley-maxlength="20" pattern="/^[A-Za-z]+$/g" data-parsley-pattern="/^[A-Za-z]+$/g" data-parsley-required class="form-control" name="items[]" placeholder="Item">
                    </div>
                    <div class="col-sm-1"><a  class="close-item-field"  href="#">x</a></div>
                </div>`;
    let input_group = document.createRange().createContextualFragment(html);
    itemContainer.appendChild(input_group);
});

$('body').on('click', '.close-item-field', function(evt){
    evt.preventDefault();
    $(this).parents().closest('.form-group').remove();
});


//form validation
$(salesForm).parsley({
    errorClass: 'is-invalid text-danger',
    successClass: 'is-valid',
    errorsWrapper: '<span class="form-text text-danger"></span>',
    errorTemplate: '<span></span>',
    trigger: 'change'
});
window.Parsley.on('field:error', function() {
    $('#btn-save').prop('disabled', true);
});
window.Parsley.on('field:success', function() {
    $('#btn-save').prop('disabled', false);
});


salesForm.addEventListener('submit', function (evt) {
    evt.preventDefault();

    //check if cookie
    let thisUser = `user-${$('#entry_by').val()}`;
    if (getCookie(thisUser).length > 0){
        renderAlert('danger', 'This user new submission limit exceeded today.')
        return;
    }

    fetch(siteURL, {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8" // otherwise $_POST is empty
            },
            body: $(this).serialize()
        })
        .then((response) => {
           if (response.ok){
               salesForm.reset();
               renderAlert('success', 'Form data stored successfully');
           }
        });
});

function renderAlert(type, message) {
    let html = ` <div class="alert alert-${type} alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>${type}</strong> ${message}
                </div>`;
    let alertContent = document.createRange().createContextualFragment(html);
    AlertContainer.innerHTML = '';
    AlertContainer.appendChild(alertContent);
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}