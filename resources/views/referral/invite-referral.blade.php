<style>
    /* .btn-close{
      color: #ff720c !important;
   } */

    .copy-text button:before {
        content: "Copied";
        position: absolute;
        top: -45px;
        right: 0px;
        background: #5c81dc;
        padding: 8px 8px;
        border-radius: 20px;
        font-size: 14px;
        display: none;
    }

    .copy-text button:after {
        content: "";
        position: absolute;
        top: -20px;
        right: 25px;
        width: 10px;
        height: 10px;
        background: #5c81dc;
        transform: rotate(45deg);
        display: none;
    }

    .copy-text.active button:before,
    .copy-text.active button:after {
        display: block;
    }
</style>





<!-- Modal -->
<div class="modal fade" id="invite-referral" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius:5px">
            <div class="p-3">
                <h5 class="modal-title text-dark" id="exampleModalLabel">Invite Your Friend</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"
                        style="font-size:30px;position:absolute; top:-5px;right:0;padding:10px">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="margin-top: -35px">
                    <p class="text-dark text-sm text-justify">You can share your referral code by
                        copying and
                        sending it or sharing it on your social media.</p>
                </div>
                <div class="mb-3 position-relative copy-text">
                    <input type="text" class="w-100 text-center text-dark text-sm text" id="referral_code"
                        style="border: 1px dashed #adadad; height:40px;border-radius:10px"
                        value="{{ $data['referral']->referral_code }}">


                    {{-- <div class="" style=""> --}}
                    <button class="badge button position-absolute "
                        style="background: #ff720c;border:none !important;top: 7px;right:10px"><i
                            class="fa-regular fa-copy"></i></button>
                    {{-- </div> --}}
                    {{-- <div class="copy-text">
                       <input type="text" class="text" value="david@stylus.co.za" />
                       <button class="button"><i class="fa fa-clone"></i></button>
                   </div> --}}
                </div>
                {{-- <div class="mb-3 col-md position-relative mt-3 copy-texts">
                    <input type="text" class="w-100 text-center text-dark text-sm text"
                        style="border: 1px dashed #adadad; height:40px;border-radius:10px"
                        value="ximply.io/referral-8832748">
                    <button class="badge button position-absolute "
                        style="background: #ff720c;border:none !important;top: 7px;right:10px"><i
                            class="fa-regular fa-copy"></i></button>
                </div> --}}
                {{-- <div>
                    <input type="text" class="w-100 text-center text-dark text-sm"
                        style="border: 1px solid #adadad; height:40px;border-radius:10px" placeholder="Email">
                </div> --}}

            </div>
            {{-- <div class="modal-footer" style="border: none">                
                <button type="button" class="btn w-100 text-white" data-bs-target="#modalReferral"
                    data-bs-toggle="modal" style="background: #ff720c">Invite Friend</button>
            </div> --}}
        </div>
    </div>
</div>

<script>
    let copyText = document.querySelector(".copy-text");
    copyText.querySelector("button").addEventListener("click", function() {
        let input = copyText.querySelector("input.text");
        input.select();
        document.execCommand("copy");
        copyText.classList.add("active");
        window.getSelection().removeAllRanges();
        setTimeout(function() {
            copyText.classList.remove("active");
        }, 2500);
    });
</script>