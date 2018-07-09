@extends('layouts.default')

@section('content')

<?php
if ($sessionData === false) {
  echo '<h3>Please add value to the bank CSV Import or Form Add Details pages.</h3>';
} else {
  //var_dump($sessionData);
?>
  <div class="container">
    <h2>Bank Details</h2>
    <p>Information below about the upload and added card details.</p>            
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Bank</th>
          <th>Card Number</th>
          <th>Expity Date</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          if (count($sessionData) > 0) {
            foreach ($sessionData as $line) { 
                ?> 
                <tr>
                    <td><?php  echo $line[0]['bank']; ?></td>
                    <td><?php  echo $line[0]['cardNumber']; ?></td>
                    <td><?php  echo $line[0]['expiryDate']; ?></td>
                </tr><?php 
                } 
            }
          ?>      
      </tbody>
    </table>
  </div>
<?php
}
?>
@stop
