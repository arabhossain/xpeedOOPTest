<?php $this->view('layout/header') ?>

<div class="container pt-5">
    <form id="xpeed-form" action="/" method="post">
        <div class="row pb-5">
            <div class="col-md-7">

                <div class="form-group row">
                    <label for="amount" class="col-sm-3 col-form-label">Amount</label>
                    <div class="col-sm-9">
                        <input type="text" required pattern="^[0-9]+" data-parsley-pattern="^[0-9]+"  name="amount" class="form-control" id="amount" value="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="buyer" class="col-sm-3 col-form-label">Buyer</label>
                    <div class="col-sm-9">
                        <input type="text" data-parsley-required data-parsley-type="alphanum" maxlength="20" data-parsley-maxlength="20" name="buyer" class="form-control" id="buyer" value="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="buyer" class="col-sm-3 col-form-label">Receipt</label>
                    <div class="col-sm-9">
                        <input type="text"  pattern="/^[A-Za-z]+$/g" data-parsley-pattern="/^[A-Za-z]+$/g" data-parsley-required name="receipt_id" class="form-control" id="receipt" value="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="buyer" class="col-sm-3 col-form-label">Buyer</label>
                    <div class="col-sm-9">
                        <input type="text" data-parsley-required maxlength="20" data-parsley-maxlength="20" class="form-control" id="buyer" value="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="buyer-email" class="col-sm-3 col-form-label">Buyer Email</label>
                    <div class="col-sm-9">
                        <input type="email"	data-parsley-type="email" data-parsley-required name="buyer_email" class="form-control" id="buyer-email" value="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                    <div class="col-sm-9">
                        <input type="text" pattern="/^(?:\+88|01)?(?:\d{11}|\d{13})$/g" data-parsley-pattern="/^(?:\+88|01)?(?:\d{11}|\d{13})$/g" data-parsley-required name="phone" class="form-control" id="phone" value="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="city" class="col-sm-3 col-form-label">City</label>
                    <div class="col-sm-9">
                        <input type="text" maxlength="20" data-parsley-maxlength="20" pattern="/^[A-Za-z]+$/g" data-parsley-pattern="/^[A-Za-z]+$/g" data-parsley-required name="city" class="form-control" id="city" value="">
                    </div>
                </div>


        </div>
        <div class="col-md-5">
            <button id="add-item" class="btn btn-primary">+ Add New Item</button>
            <div id="items-container">
                <div class="form-group row pt-2">
                    <div class="col-sm-11">
                        <input type="text"  maxlength="20" data-parsley-maxlength="20" pattern="/^[A-Za-z]+$/g" data-parsley-pattern="/^[A-Za-z]+$/g" data-parsley-required class="form-control" name="items[]" placeholder="Item">
                    </div>
                    <div class="col-sm-1"><a class="close-item-field" href="#">x</a></div>
                </div>
            </div>


            <div class="form-group row pt-2">
                <label for="comment" class="col-sm-3 col-form-label">Note</label>
                <div class="col-sm-9">
                    <textarea class="form-control" rows="5" id="note" name="note"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-sm-3 col-form-label">User</label>
                <div class="col-sm-9">
                    <input type="text" pattern="^[0-9]+" data-parsley-pattern="^[0-9]+" data-parsley-required name="entry_by" class="form-control" id="entry_by" value="">
                </div>
            </div>

        </div>
    </div>
        <div class="fixed-bottom bg-dark pt-2 pb-2">
            <div class="container d-flex flex-row-reverse">
                <button type="submit" name="btn-save" id="btn-save" value="submit" class="btn btn-success">Save</button>
            </div>

        </div>
    </form>
</div>


<?php $this->view('layout/footer') ?>

