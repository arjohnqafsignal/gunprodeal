<div tabindex="-1" class="modal fade rate-product in" role="dialog" aria-hidden="true" style="padding-right: 16px; display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <h3 class="modal-title">Rate Product.</h3>
            </div>
            <div class="modal-body">
                <!-- content goes here -->
                <form>
                    <div class="skin-minimal">
                        <div class="form-group col-md-6 col-sm-6">
                            <ul class="list">
                                <li >
                                  <div class="rating">
                                        <input type="radio" value="1" name="rateRadio" required /> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        Poor
                                        <span class="rating-count">(1)</span>
                                   </div>
                                </li>
                                <li>
                                    <div class="rating">
                                        <input type="radio" value="2" name="rateRadio" /> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        Fair
                                        <span class="rating-count">(2)</span>
                                   </div>
                                </li>
                                <li>
                                    <div class="rating">
                                        <input type="radio" value="3" name="rateRadio" /> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        Average
                                        <span class="rating-count">(3)</span>
                                   </div>
                                </li>
                                <li>
                                    <div class="rating">
                                        <input type="radio" value="4" name="rateRadio" /> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star-o"></i> 
                                        Good
                                        <span class="rating-count">(4)</span>
                                   </div>
                                </li>
                                <li>
                                    <div class="rating">
                                        <input type="radio" value="5" name="rateRadio" /> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        <i class="fa fa-star"></i> 
                                        Excelent
                                        <span class="rating-count">(5)</span> 

                                   </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="form-group  col-md-12 col-sm-12">
                        <label>Remarks</label>
                        <textarea id="remarks" placeholder="This comment will be not posted on our system." rows="3" class="form-control " required></textarea>
                    </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12 col-sm-12 margin-bottom-20 margin-top-20">
                            <button id="submitRate" type="button" class="btn btn-theme btn-block">Submit</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>