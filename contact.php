<?php require 'inc/header.php'; ?>
<div id="contact-page">
    <div class="contact-curved"></div>
        <div class="contact-curved-upper flex flex-wrap">
            <div class="col-xs-8 margin-auto">
                <div class="box-header pad-bt-1">                    
                    <div class="box-title align-center">
                        <h1 class="display-3 text-white reset-margin">Contact</h1>
                        <p class="text-white">Want more information? Please reach out via the contact form below.</p>
                    </div>
                </div>
                <div class="box-body bg-white pad-all-1" style="border-radius: 10px;">                
                    <form>
                        <div class="form-group flex flex-column">
                            <label class="align-left">Full Name</label>
                            <input type="text" name="ClientName" class="form-control"/>
                        </div>
                        <div class="form-group flex flex-column">
                            <label class="align-left">Email Address</label>
                            <input type="text" name="ClientEmail" class="form-control"/>
                        </div>
                        <div class="form-group flex flex-column">
                            <label class="align-left">How can we help?</label>
                            <textarea name="ClientMessage" class="form-control" rows="10"></textarea>
                        </div>
                        <div class="flex align-center pad-bt-1">
                            <button class="btn btn-primary" style="margin-top: 20px;">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require 'inc/footer.php'; ?>