<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Company Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="signup-container shadow-lg rounded p-3">
                    <form method="post" action="./api/update-user.php" id='update-record-form'>
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="companyName" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="company-name" name="companyName" required>
                        </div>

                        <div class="mb-3">
                            <label for="aboutCompany" class="form-label">About Company</label>
                            <textarea name="aboutCompany" id="about-company" cols="30" rows="3" class='form-control'
                                required></textarea>
                        </div>
                        <input type="hidden" name="recordID" value="">
                        <button type="submit" class="btn btn-primary submit" name='updateRecord'>Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        </div>
    </div>
</div>
</div>