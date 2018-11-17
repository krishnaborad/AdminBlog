@extends('admin.layouts.adminapp')
@section('content')

<h2>Add New Category</h2>
        <div class="box-inner">
            <div class="box-content">

                    <form  class="form" method="post">
                                {{ csrf_field() }}
                        <!-- Add company start -->
                        <?php
                            $company = App\setting::where('key','company_options')->first();
                        ?>
                            @if($company->value==1)
                            <label for=""> Select Company :</label>
                                <div class="">
                                    <select  class="select2 form-control"  name="company_id">
                                        @foreach($companys as $company)
                                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                    

                        <!-- Add Company End -->
                        @if ($errors->any())
                            <div class="alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <br>
                        <!-- Add Category start -->
                        <div class="form-body">
                            <label for="post_title">Category Name &nbsp: </label>
                            <input type="text" class="form-control" name="name" value="" placeholder="Enter Category Name"><br>
                        </div>
                        <!-- Add category End -->
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                            Add Category</button>
                    </form>
                </form>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
