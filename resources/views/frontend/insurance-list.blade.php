@extends('layouts.index')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif

@include('layouts.frontend.car-background')


<section>
 <div class="container">
   <div class="row">
     <div class="col-md-8">
			<div class="card">
			    <div class="card-content">
				    <form> <input type="hidden">
					         <div class="field"><label class="label">
						        Motor Registration Copy ( both side )
								<span class="has-text-danger">*</span></label> <p class="help is-primary">
						Hold <kbd>ctrl</kbd> key to select multiple image
					</p> <div class="control"><input required="required" id="registration_copy" type="file"></div>
                    </div> <div class="field">
                    <label for="previous_insurance_image" class="label">Previous Insurance copy (If Any)</label> 
                    <div class="control"><input id="previous_insurance_image" name="previous_insurance_image" type="file" placeholder="" accept="image/*"></div>
                    </div> <div class="field"><label for="remarks" class="label">Additional Informations</label> 
                    <div class="control"><textarea name="remarks" id="remarks" class="textarea"></textarea>
                    </div>
                    </div> 
                    <div class="sms-terms">
                     <a href="#">Terms & Conditions</a>
                    </div>
                    <button type="submit" class="button is-info">Submit</button></form></div></div>
			</div>
     <div class="col-md-4">
	 <div class="breakdown-content"><div class="some_random_class"><h3 class="my-2 is-size-3">Act Liability Breakdown</h3> <div class="single-block"><div class="block-term"><span>
                            Type
                        </span></div> <div class="block-detail"><span>
                            Act Liability Insurance
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            Insurance Provider Company
                        </span></div> <div class="block-detail"><span>
                            Bangladesh National Insurance Company Limited
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            CC Type
                        </span></div> <div class="block-detail"><span>
                            800 cc - 1300 cc
                        </span></div></div><div class="single-block has-full-line"><div class="block-term"><span>
                            
                        </span></div> <div class="block-detail"><span>
                            
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            Act Liabilities
                        </span></div> <div class="block-detail"><span>
                            Tk. 150
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            + 4 Passenger @ 45
                        </span></div> <div class="block-detail"><span>
                            Tk. 180
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            + 1 Driver
                        </span></div> <div class="block-detail"><span>
                            Tk. 30
                        </span></div></div><div class="single-block has-half-line"><div class="block-term"><span>
                            
                        </span></div> <div class="block-detail"><span>
                            
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            Net Premium
                        </span></div> <div class="block-detail"><span>
                            Tk. 360
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            + 15% Vat
                        </span></div> <div class="block-detail"><span>
                            Tk. 54
                        </span></div></div><div class="single-block has-full-line"><div class="block-term"><span>
                            
                        </span></div> <div class="block-detail"><span>
                            
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            Total Premium
                        </span></div> <div class="block-detail"><span>
                            Tk. 414
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            + Service Delivery Cost
                        </span></div> <div class="block-detail"><span>
                            Tk. 40
                        </span></div></div><div class="single-block has-full-line"><div class="block-term"><span>
                            
                        </span></div> <div class="block-detail"><span>
                            
                        </span></div></div><div class="single-block"><div class="block-term"><span>
                            Grand Total
                        </span></div> <div class="block-detail"><span>
                            Tk. 454</span>
                        </div>
                    </div>
                </div>
            </div>

			<div class="breakdown-content"><div class="some_random_class"><h3 class="my-2 is-size-3">Full Comprehensive</h3> <div class="single-block"><div class="block-term"><span>
                        Type
                    </span></div> <div class="block-detail"><span>
                        Comprehensive Insurance
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        Insurance Provider Company
                    </span></div> <div class="block-detail"><span>
                        Bangladesh National Insurance Company Limited
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        CC Type
                    </span></div> <div class="block-detail"><span>
                        800 cc - 1300 cc
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        Sum Insured
                    </span></div> <div class="block-detail"><span>
                        Tk. 676700
                    </span></div></div><div class="single-block has-full-line"><div class="block-term"><span>
                        
                    </span></div> <div class="block-detail"><span>
                        
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        Basic
                    </span></div> <div class="block-detail"><span>
                        Tk. 2795
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        + 2.65% of full value
                    </span></div> <div class="block-detail"><span>
                        Tk. 17933
                    </span></div></div><div class="single-block has-half-line"><div class="block-term"><span>
                        
                    </span></div> <div class="block-detail"><span>
                        
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        Own Damage
                    </span></div> <div class="block-detail"><span>
                        20728
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        + Act Liabilities
                    </span></div> <div class="block-detail"><span>
                        Tk. 150
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        + 4 Passenger @ 45
                    </span></div> <div class="block-detail"><span>
                        Tk. 180
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        + 1 Driver @ 30
                    </span></div> <div class="block-detail"><span>
                        Tk. 30
                    </span></div></div><div class="single-block has-half-line"><div class="block-term"><span>
                        
                    </span></div> <div class="block-detail"><span>
                        
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        Net Premium
                    </span></div> <div class="block-detail"><span>
                        Tk. 21088
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        + 15% Vat
                    </span></div> <div class="block-detail"><span>
                        Tk. 3163
                    </span></div></div><div class="single-block has-full-line"><div class="block-term"><span>
                        
                    </span></div> <div class="block-detail"><span>
                        
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        Total Premium
                    </span></div> <div class="block-detail"><span>
                        Tk. 24251
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        + Service Delivery Cost
                    </span></div> <div class="block-detail"><span>
                        Tk. 40
                    </span></div></div><div class="single-block has-full-line"><div class="block-term"><span>
                        
                    </span></div> <div class="block-detail"><span>
                        
                    </span></div></div><div class="single-block"><div class="block-term"><span>
                        Grand Total
                    </span></div> <div class="block-detail"><span>
                        Tk. 24291</span>
                    </div>
                </div>
            </div>
        </div>
	 </div>
   </div>
 </div>
</section>


@endsection