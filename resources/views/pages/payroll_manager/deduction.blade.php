@extends('layout.pr_carousel')

@section('Title')
<h1 class="section-title mt-4 pb-1 w-100 text-center pt-4">Deduction Management</h1>
@endsection

@section('controls')
    <li class="active"><a data-toggle="tab" class="h5 text-decoration-none m-0" href="#home">Employee Deductions</a></li>
    <li><a data-toggle="tab" class="h5 text-decoration-none m-0" href="#menu1">Create Employee Deductions</a></li>
@endsection

@section('first')
    <h1 class="display-4 pb-5 mt-5 text-center w-100">Employee Deductions</h1>
    @include('inc.date_filter')
    <table class="table table-striped text-centerresponsive w-100" id="deduction_table">
        <thead>
            <tr class="text-center">
                <th class="col">Transaction ID</th>
                <th class="col" data-priority="1">Employee Details</th>
                <th class="col" data-priority="1">Deduction Name</th>
                <th class="col">Deduction Start Date</th>
                <th class="col">Deduction End Date</th>
                <th class="col" data-priority="1">Deduction Amount</th>
                <th class="col">Payroll Manager</th>
                <th class="col">Added on (UTC)</th>
                <th class="col" data-priority="1">Delete</th>
            </tr>
        </thead>
    </table>
@endsection

@section('second')
    <div class="row">
        <h1 class="display-4 pb-5 mt-5 text-center w-100">Create Employee Deductions</h1>
        <div class="col card p-2 shadow-sm">
            <h1 class="display-5 text-center w-100">Employee Selection</h1>
            <div class="container">
                <table class="table w-100 table-striped text-centerresponsive w-100" id="employee_table">
                    <thead>
                        <tr class="text-center">
                            <th class="col">Employee ID</th>
                            <th class="col" data-priority="1">Employee Picture</th>
                            <th class="col" data-priority="1">Employee Name</th>
                            <th class="col">Department</th>
                            <th class="col">Position</th>
                            <th class="col" data-priority="2">Select</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="col">
            <div class="container border-bottom" style="height: 400px;overflow-y:scroll; overflow-x:hidden;">
                <h1 class="display-5 m-3 text-center w-100">Selected Employees</h1>
                <table class="table table-striped text-center">
                    <thead>
                        <tr class="text-center">
                            <th class="col">Employee ID</th>
                            <th class="col">Employee Picture</th>
                            <th class="col">Employee Name</th>
                            <th class="col">Department</th>
                            <th class="col">Position</th>
                        </tr>
                    </thead>
                    <tbody id="selected_employee_table"></tbody>
                </table>
            </div>
            <div class="container alert-light mt-4 p-0 rounded shadow-sm">
                <h3 class="mb-3 text-center p-3 w-100 alert-info">Deduction Details</h3>
                <div class="m-5 ps-5 pe-5">
                    {!! Form::label('deduction_start_date_input', 'Deduction Date', ['class'=>'w-100 text-center']) !!}
                    <div class="row mb-3 w-100">
                        <div class="col input-daterange">
                            <input type="text" name="deduction_start_date_input" id="deduction_start_date_input" class="form-control h-100 p-3 w-75 m-auto" placeholder="From Date" readonly />
                        </div>
                        <div class="col-1 text-center h2 pt-2">-</div>
                        <div class="col input-daterange">
                            <input type="text" name="deduction_end_date_input" id="deduction_end_date_input" class="form-control h-100 p-3 w-75 m-auto" placeholder="To Date" readonly />
                        </div>
                    </div>

                    {!! Form::label('deduction_name', 'Deduction Name', []) !!}
                    <input list="browsers" name="deduction_name" id="deduction_name" class="form-control" /></label>
                    <datalist id="browsers">
                        @foreach ($deduction_names as $item)
                            <option value="{{$item->deduction_name}}">
                        @endforeach
                    </datalist>
                    {!! Form::label('deduction_amount', 'Deduction Amount', []) !!}
                    {!! Form::number('deduction_amount','', ['id'=>'deduction_amount', 'min' => '0.01', 'step'=>'any' ,'placeholder'=>'0.00','class'=>'text-center form-control mb-3']) !!}

                    <div class="row">
                        <div class="col">
                            <button type="button" onclick="addDeduction()" class="btn btn-outline-success w-100 p-3" data-toggle="modal" data-target="#edit_modal">Add Deduction</button>
                        </div>
                        <div class="col-4">
                            <button onclick="location.reload()" class="btn btn-danger w-100 p-3">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <!-- The Modal -->
    <div class="modal" id="edit_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title w-100">Continue to Add Cash Advance</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body row">
                    <div class="row">
                        <div class="col ps-5">
                            <p class="h5 text-center w-100">Selected Employees</p>
                            <hr>
                            <table class="w-100 m-auto text-center">
                                <thead>
                                    <th>ID</th>
                                    <th>Name</th>
                                </thead>
                                <tbody>
                                    <td><h6 id='modal_emp_id'></h6></td>
                                    <td><h6 id='modal_emp_names'></h6></td>
                                </tbody>
                            </table>
                        </div>
                        <div class="col">
                            <p class="h5 text-center w-100">Deduction Details</p>
                            <hr>

                            <h6>Deduction Date</h6>
                            <div class="row">
                                <div class="col">
                                    {!! Form::text('modal_deduction_start_date', 'from date', ['disabled','id'=>'modal_deduction_start_date','class'=>'p-2 w-100 text-center']) !!}
                                </div>
                                <div class="col-1 h2">-</div>
                                <div class="col">
                                    {!! Form::text('modal_deduction_end_date', 'to date', ['disabled','id'=>'modal_deduction_end_date','class'=>'p-2 w-100 text-center']) !!}
                                </div>
                            </div>

                            <hr>
                            <h6>Deduction Name</h6>
                            {!! Form::text('modal_deduction_name', 'date', ['disabled','id'=>'modal_deduction_name','class'=>'p-2 w-100 text-center']) !!}
                            <hr>
                            <h6>Deduction Amount</h6>
                            {!! Form::text('modal_deduction_amount', 'date', ['disabled','id'=>'modal_deduction_amount','class'=>'p-2 w-100 text-center']) !!}
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <div class="row w-100">
                        <div class="col-3 border border-secondary rounded text-center pt-2">
                            {!! Form::open(['action'=>'App\Http\Controllers\Payroll\PayrollInsertController@InsertDeduction']) !!}
                            {{ Form::label('chk', 'Notifications', ['class' => 'control-label']) }}
                            {!! Form::checkbox('chk', 'value', true,['class'=>'form-check-input']) !!}
                        </div>
                        <div class="col">
                                {!! Form::hidden('hidden_emp_id','',['id'=>'hidden_emp_id']) !!}
                                {!! Form::hidden('hidden_deduction_start_date','',['id'=>'hidden_deduction_start_date']) !!}
                                {!! Form::hidden('hidden_deduction_end_date','',['id'=>'hidden_deduction_end_date']) !!}
                                {!! Form::hidden('hidden_deduction_name','',['id'=>'hidden_deduction_name']) !!}
                                {!! Form::hidden('hidden_deduction_amount','',['id'=>'hidden_deduction_amount']) !!}
                                {!! Form::submit('Confirm Deduction', ['class' => ' w-100 h-100 btn btn-success']) !!}
                            {!! Form::close() !!}
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-danger w-100 h-100" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('.input-daterange').datepicker({
                todayBtn:'linked',
                format:'yyyy-mm-dd',
                autoclose:true
            });

            let { start_date, end_date } = getDateToday();
            $('#from_date').val(start_date);
            $('#to_date').val(end_date);
            load_table(start_date,end_date);
            updateDeductionDate()

            function load_table(from_date = '', to_date = ''){
                $('#deduction_table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '/deductionjson',
                        data:{
                            from_date: from_date,
                            to_date: to_date
                        }
                    },
                    columns: [
                        { data: 'deduction_id',
                            render : (data,type,row)=>{
                                return `<b>${data}</b>`
                            }
                        },
                        { data: 'fname',
                            render : (data,type,row)=>{
                                return `<b>${row.fname} ${row.mname} ${row.lname}</b><br>
                                            ${row.department}<br>
                                            ${row.position}`
                            }
                        },
                        { data: 'deduction_name',
                            render : (data,type,row)=>{
                                return `<b>${data}</b>`
                            }
                        },
                        { data: 'deduction_start_date',
                            render : (data,type,row)=>{
                                return `<b>${data}</b>`
                            }
                        },
                        { data: 'deduction_end_date',
                            render : (data,type,row)=>{
                                return `<b>${data}</b>`
                            }
                        },
                        { data: 'deduction_amount',
                            render : (data,type,row)=>{
                                return `<b>???${data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}</b>`
                            }
                        },
                        { data: 'payroll_manager',
                            render : (data,type,row)=>{
                                return `<b>${data}</b>`
                            }
                        },
                        { data: 'added_on',
                            render : (data,type,row)=>{
                                return `<b>${data}</b>`
                            }
                        },
                        {   data: 'deduction_id',
                            render : (data,type,row)=>{
                                return row.delete
                            }
                        }
                    ]
                })
            }

            $('#filter').click(function(){
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                if(from_date != '' &&  to_date != ''){
                    $('#deduction_table').DataTable().destroy();
                    load_table(from_date, to_date);
                }else{
                    alert('Both Date is required');
                }
            });

            $('#refresh').click(function(){
                let { start_date, end_date } = getDateToday();
                $('#from_date').val(start_date);
                $('#to_date').val(end_date);
                $('#deduction_table').DataTable().destroy();
                load_table(start_date,end_date);
            });

            $('#employee_table').DataTable({
                    processing: true,
                    serverSide: false,
                    ajax: {
                        url: '/employeelistjson'
                    },
                    columns: [
                        { data: 'employee_id',
                            render : (data,type,row)=>{
                                return `<b>${data}</b>`
                            }
                        },
                        { data: 'employee_id',
                            render : (data,type,row)=>{
                                return `<img src="{{ URL::asset('${row.user_detail.picture}')}}" class="rounded" width="50" height="50">`
                            }
                        },
                        { data: 'user_detail.fname',
                            render : (data,type,row)=>{
                                return `<b>${data} ${row.user_detail.mname} ${row.user_detail.lname}</b>`
                            }
                        },
                        { data: 'department',
                            render : (data,type,row)=>{
                                return `<b>${data}</b>`
                            }
                        },
                        { data: 'position',
                            render : (data,type,row)=>{
                                return `<b>${data}</b>`
                            }
                        },
                        { data: 'employee_id',
                            render : (data,type,row)=>{
                                return row.select
                            }
                        }
                    ]
                })
        })

        function selectEmployee(btn, emp_id, emp_picture, emp_name, emp_department, emp_position){
            if(btn.innerHTML == "Select"){
                btn.innerHTML = 'Selected'
                btn.className = 'btn btn-success';

                $('#hidden_emp_id').val(`${$('#hidden_emp_id').val()}${emp_id};`)

                $('#modal_emp_id').html(`${$('#modal_emp_id').html()}${emp_id}<br>`)
                $('#modal_emp_names').html(`${$('#modal_emp_names').html()}${emp_name}<br>`)

                $('#selected_employee_table').html(
                `${$('#selected_employee_table').html()}

                <tr>
                    <td>${emp_id}</td>
                    <td><img src="{{ URL::asset('${emp_picture}')}}" class="rounded" width="50" height="50"></td>
                    <td>${emp_name}</td>
                    <td>${emp_department}</td>
                    <td>${emp_position}</td>
                </tr>
                `)
            }else{
                btn.innerHTML = 'Select'
                btn.className = 'btn btn-outline-primary text-primary';

                $('#hidden_emp_id').val($('#hidden_emp_id').val().replace(`${emp_id};`,''))

                $('#modal_emp_id').html(`${$('#modal_emp_id').html().replace(`${emp_id}<br>`,'')}`)
                $('#modal_emp_names').html(`${$('#modal_emp_names').html().replace(`${emp_name}<br>`,'')}`)

                $('#selected_employee_table').html($('#selected_employee_table').html().replace(`<tr>
                    <td>${emp_id}</td>
                    <td><img src="{{ URL::asset('${emp_picture}')}}" class="rounded" width="50" height="50"></td>
                    <td>${emp_name}</td>
                    <td>${emp_department}</td>
                    <td>${emp_position}</td>
                </tr>`,''))
            }
        }

        function updateDeductionDate(){
            var today = new Date();
            $('#deduction_start_date_input').val(`${today.getFullYear()}-${today.getMonth()+1}-${today.getDate()}`)
            $('#deduction_end_date_input').val(today.getFullYear()+'-'+(today.getMonth()+1)+'-'+30)
        }

        function getDateToday(){
            var today = new Date();
            var start_date = ''
            var end_date = ''

            if(today.getDate() < 16){
                start_date = formatDate(today.getFullYear()+'-'+(today.getMonth()+1)+'-'+1);
                end_date = formatDate(today.getFullYear()+'-'+(today.getMonth()+1)+'-'+15);
            }
            else{
                start_date = formatDate(today.getFullYear()+'-'+(today.getMonth()+1)+'-'+16);
                end_date = formatDate(today.getFullYear()+'-'+(today.getMonth()+1)+'-'+30);
            }

            return {start_date,end_date};
        }

        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [year, month, day].join('-');
        }

        function addDeduction(){
            $('#hidden_deduction_start_date').val($('#deduction_start_date_input').val())
            $('#hidden_deduction_end_date').val($('#deduction_end_date_input').val())
            $('#hidden_deduction_name').val($('#deduction_name').val())
            $('#hidden_deduction_amount').val($('#deduction_amount').val())

            $('#modal_deduction_start_date').val($('#deduction_start_date_input').val())
            $('#modal_deduction_end_date').val($('#deduction_end_date_input').val())
            $('#modal_deduction_name').val($('#deduction_name').val())
            $('#modal_deduction_amount').val($('#deduction_amount').val())
        }
    </script>
@endsection

