@extends('layout')

@section('innerpage')

<section class="h-100 gradient-form" style="background-color: #eee;">
    <br>
  <div class="container py-5 h-100"style="background-color: white;">

            <table class="table" >
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">User Id</th>
                <th scope="col">Name</th>
                <th scope="col">Date</th>
                <th scope="col">Contact</th>
                <th scope="col">Mode</th>
                <th scope="col">Amount</th>
                <th scope="col">Ref Number</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lims as $key=>$item)
                <tr valign="middle">
                <th scope="row">{{ $key+1 }}</th>
                <td>{{ $item->user_id }}</td>
                @php
                    $name=App\Models\User::find($item->user_id)->name;
                @endphp
                <td>{{ $name }}</td>
                <td>{{ $item->contact }}</td>
                <td>{{ date('d-m-y',strtotime($item->date)) }}</td>
                <td>{{ $item->modeofrequest }}</td>
                <td>{{ $item->current_bal }}</td>
                <td>{{ $item->ref_number }}</td>
                <td>
                    @if($item->status==0)
                        New Request
                    @elseif ($item->status==1)
                        Completed
                    @elseif ($item->status==2)
                        Rejected
                    @endif

                </td>
                <td><button data-id='{{ $item->id }}' data-status='{{ $item->status }}' class="btn btn-primary btn-sm btn-block fa-lg gradient-custom-2 mb-3 update" >Update</button></td>
                </tr>
                @endforeach


            </tbody>
            </table>

          <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Update Withdraw</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('updatewithdraw') }}" method="post">
            <div class="modal-body">
                                @csrf
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example11">Ref Details</label>
                                    <input type="hidden" id="id1" name="id">
                                    <input type="text" id='uref' name="uref" id="form2Example11" class="form-control"
                                    placeholder="Reference Details" required/>
                                </div>

                                <div class="form-outline mb-4">
                                   <select name="status" id="status" class="form-control">
                                    <option value="0">New Request</option>
                                    <option value="1">Complete</option>
                                    <option value="2">Declained</option>
                                   </select>
                                </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
             </form>
          </div>
        </div>
    </div>

  </div>
</section>

<script>
//data-bs-toggle="modal" data-bs-target="#exampleModal"
$('.update').on('click',function(){
    var id=$(this).data('id');
    var status=$(this).data('status');
    $('#id1').val(id);
    $('#status').val(status);
    $('#exampleModal').modal('show');
 });
</script>
@endsection
                                                                                                                             