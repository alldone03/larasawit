<div class="modal fade text-left" id="inlineFormAdd" tabindex="-1" aria-labelledby="myModalLabel33" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">
                    Add Device
                </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <iframe name="frame2" style="display: none;"></iframe>
            <form id="addDevice" target="frame2">

                <div class="modal-body">
                    <label for="device">Device: </label>
                    <div class="form-group">
                        <fieldset class="form-group">
                            <select class="form-select" id="device" name="device">

                            </select>
                        </fieldset>
                    </div>
                    <label for="user">User: </label>
                    <div class="form-group">
                        <fieldset class="form-group">
                            <select class="form-select" id="user" name="user">

                            </select>
                        </fieldset>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="add" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Add</span>
                    </button>
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
