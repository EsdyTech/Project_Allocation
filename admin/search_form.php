
<!-----------------------------------------------Advance Search Form Modal --------------------------------------------------->
<div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
<h3 id="myModalLabel">Advance Search Form</h3>
</div>

<div class="modal-body">
    <form class="form-horizontal" method="post" action="advance_search.php">
	           
			  <div class="control-group">
		      <label class="control-label" for="inputEmail">Item Name</label>
			  <div class="controls">
			  <select name="item_name" class="" required/>
			  <option>&larr; Select Item Name &rarr;</option>
			  
			  <option></option>
			  
			  </select>
		      </div>
	          </div>
			  			  			
			 <div class="control-group">
		      <label class="control-label" for="inputEmail">Item Serial / Code</label>
			  <div class="controls">
			  <select name="item_serial" class="" required/>
			  <option>&larr; Select Item Serial / Code &rarr;</option>
			  
			  <option></option>
			  
			  </select>
		      </div>
	          </div>
			  
			   							
                <div class="control-group">
                <div class="controls">
                <button type="submit" id="search1" data-placement="left" title="Click to Search" class="btn btn-primary"><i class="icon-search"></i> Search</button>
				 <script type="text/javascript">
		        $(document).ready(function(){
		        $('#search1').tooltip('show');
		        $('#search1').tooltip('hide');
		        });
		        </script> 
                </div>
                </div>
				
    </form>
</div>

<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
</div>
</div>