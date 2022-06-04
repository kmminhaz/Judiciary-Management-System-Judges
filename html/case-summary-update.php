<?php include('./php/navbar.php') ?>
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add a Case Summary</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-body">
                        <label class="col-md-12">Case ID</label>
                        <div class="col-md-12">
                            <input
                            type="text"
                            class="form-control form-control-line"
                            name="caseId"
                            />
                        </div>
                        <label class="col-md-12">Case Title</label>
                                <div class="col-md-12">
                                <input
                                    type="text"
                                    class="form-control form-control-line"
                                    name="caseTitle"
                                />
                                </div>
                        <label class="col-md-12">Case Type</label>
                                <div class="col-md-12">
                                <input
                                    type="text"
                                    class="form-control form-control-line"
                                    name="caseType"
                                />
                                </div>
                    </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 d-flex flex-column align-items-center">
                                <h4 class="fw-bold">Plaintiff</h4>
                                <label class="col-md-12">Name</label>
                                <div class="col-md-12">
                                <input
                                    type="text"
                                    class="form-control form-control-line"
                                    name="plaintiffName"
                                />
                                </div>
                                <label class="col-md-12">Address</label>
                                <div class="col-md-12">
                                <input
                                    type="text"
                                    class="form-control form-control-line"
                                    name="plaintiffAddress"
                                />
                                </div>
                                <label class="col-md-12">Phone</label>
                                <div class="col-md-12">
                                <input
                                    type="text"
                                    class="form-control form-control-line"
                                    name="plaintiffPhone"
                                />
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex flex-column align-items-center">
                                <h4 class="fw-bold">Diffendent</h4>
                                <label class="col-md-12">Name</label>
                                <div class="col-md-12">
                                <input
                                    type="text"
                                    class="form-control form-control-line"
                                    name="diffendentName"
                                />
                                </div>
                                <label class="col-md-12">Address</label>
                                <div class="col-md-12">
                                <input
                                    type="text"
                                    class="form-control form-control-line"
                                    name="diffendentAddress"
                                />
                                </div>
                                <label class="col-md-12">Phone</label>
                                <div class="col-md-12">
                                <input
                                    type="text"
                                    class="form-control form-control-line"
                                    name="diffendentPhone"
                                />
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 d-flex flex-column align-items-center">
                                <h4 class="fw-bold text-center">Plaintiff Side</h4>
                                <input type="file" name="plaintiffAdvocateImage">
                                <label class="col-md-12">Advocate Name</label>
                                <div class="col-md-12">
                                <input
                                    type="text"
                                    class="form-control form-control-line"
                                    name="plaintiffAdvocateName"
                                />
                                </div>
                                <label class="col-md-12">Advocate ID</label>
                                <div class="col-md-12">
                                <input
                                    type="text"
                                    class="form-control form-control-line"
                                    name="plaintiffAdvocateId"
                                />
                                </div>
                                <label class="col-md-12">Advocate Phone</label>
                                <div class="col-md-12">
                                <input
                                    type="text"
                                    class="form-control form-control-line"
                                    name="plaintiffAdvocatePhone"
                                />
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex flex-column align-items-center">
                                <h4 class="fw-bold text-center">Diffendent Side</h4>
                                <input type="file" name="diffendentAdvocateImage">
                                <label class="col-md-12">Advocate Name</label>
                                <div class="col-md-12">
                                <input
                                    type="text"
                                    class="form-control form-control-line"
                                    name="diffendentAdvocateName"
                                />
                                </div>
                                <label class="col-md-12">Advocate ID</label>
                                <div class="col-md-12">
                                <input
                                    type="text"
                                    class="form-control form-control-line"
                                    name="diffendentAdvocateId"
                                />
                                </div>
                                <label class="col-md-12">Advocate Phone</label>
                                <div class="col-md-12">
                                <input
                                    type="text"
                                    class="form-control form-control-line"
                                    name="diffendentAdvocatePhone"
                                />
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                    <div class="card-body">
                        <h3 class="fw-bold">Summary</h3>
                        <h4 class="fw-bold text-center">Plaintiff Side</h4>
                        <label class="col-md-12">Summary</label>
                            <div class="col-md-12">
                            <textarea
                                type="text"
                                class="form-control form-control-line"
                                name="plaintiffSummery">

                            </textarea>
                            </div>
                        <label class="col-md-12">Summary</label>
                        <h4 class="fw-bold text-center">Diffendent Side</h4>
                        <label class="col-md-12">Summary</label>
                            <div class="col-md-12">
                            <textarea
                                type="text"
                                class="form-control form-control-line"
                                name="diffendentSummery">

                            </textarea>
                            </div>
                        <label class="col-md-12">Case Status</label>
                            <div class="col-md-12">
                            <input
                                type="text"
                                class="form-control form-control-line"
                                name="caseStatus"
                            />
                            </div>
                    </div>
                    </div>
                </div>
                

                <div class="col-12">
                    <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h3 class="fw-bold pb-4">Judges</h3>
                            <div class="col-lg-4 d-flex flex-column align-items-center">
                                <input type="file" name="judgeImage" >
                                <label class="col-md-12">Judge Name</label>
                                <div class="col-md-12">
                                <input
                                    type="text"
                                    class="form-control form-control-line"
                                    name="judgeName"
                                />
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="submit" type="submit" name="submitSummery" value="upload" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
    </form>
</div>
<?php include('./php/footer.php') ?>