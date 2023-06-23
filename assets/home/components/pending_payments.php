<?php 
session_start();




$employer = 1004033022 ;
require_once '../classes/manage.php';
$query = new Manage();





$branch = $_SESSION['branch'];



$employees = $query->getRows("select a.*, b.*, c.*  from transactions as a,  employer_tb as b, payment_type as c where a.employerId = b.employer_id and a.payment_type = c.p_typeId and a.approve_status =1 and b.branchId=$branch"); 


//$uploadCount = $query->getRow("select count(rc_uploadId) as upCount from upload_requirement where artisan_id = $artisan"); 

//$rcount = $recCount['recCount'];
//$ucount = $uploadCount['upCount'];

//$prequest = $query->getRows("select a.*, b.* from service_request as a, states as b where a.clientId = b.id and  a.artisanId=$artisan");

//if($payment !=1){
  //if ($rcount===$ucount){
       //     header("location:invoice");
    
     //   }
        
//}

?>
         <div class="card">
                <h5 class="card-header" style="font-size:30px;">Pending Payments</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table id="tabulka_kariet1" class="table ">
                      <thead>
                        <tr>
                            <th>Employer</th>
                          <th>Payment Type</th>
                          <th>Amount</th>
                          
                          
                          <th>Approve Status</th>
                     
                        
                          
                    
                          <th>Action</th>
                           <th>Manage</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                         

                          <?php foreach($employees as $row){ 
                         $ap = $row['approve_status'];
                          
                          ?>
                        <tr>
                         
                          <td><?php echo $row['company_name'] ?></td>
                          <td><?php echo $row['payment_name'] ?></td>
                            <td><?php echo $row['amount'] ?></td>
                              <td>  <?php if($ap == 0){  ?>
                              
                            <span class="badge bg-label-primary me-1">PENDING</span>
                              <?php }else{ ?>
                              
                              <span class="badge bg-label-primary me-1">APPROVED</span>
                              <?php } ?>
                              </td>
                              
                            
                       
                        <!---
                               <td>
                        <?php if($ap == 0){  ?>
                              
                           <a href="" type="button" class="btn btn-primary">APPROVE</a> 
                              <?php }else{ ?>
                              
                               <a href="" type="button" class="btn btn-primary">DETAILS</a>
                              <?php } ?>
                            
                           
                           </td>
                           -->
                          <td>
                            <div class="dropdown">
                              <button
                                type="button"
                                class="btn p-0 dropdown-toggle hide-arrow"
                                data-bs-toggle="dropdown"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);"
                                  ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                >
                                <a class="dropdown-item" href="javascript:void(0);"
                                  ><i class="bx bx-trash me-1"></i> Delete</a
                                >
                              </div>
                            </div>
                          </td>
                        </tr>
                        
                        <?php } ?>
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>