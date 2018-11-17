@extends('admin.layouts.adminapp')
@section('content')
<h2>Edit Category</h2>
        <div class="box-inner">
            <div class="box-content">
                        <form action="" class="form" method="post">
                                {{ csrf_field() }}
                        <!-- Company Start -->
                                <?php
                                    $company = App\setting::where('key','company_options')->first();
                                ?>

                                @if($company->value==1)
                                    <div class="form-body">
                                        <label for="post_body">Select Company :</label>
                                        <select  class="select2 form-control"  name="company_id">
                                            @foreach($companys as $company)
                                                @if($company->id == $category->company_id)
                                                    <option value="{{ $company->id }}" selected >{{ $company->name }}</option>
                                                @else
                                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                @endif

                        <!-- Company End -->
                    
                        <!-- Category start -->
                        <div class="form-body">
                            <label for="post_title">Category Name :</label>
                            <input type="text" class="form-control" name="name" value="{{ $category->name }}" ><br>
                        </div>
                        <!-- Category End -->
                        <button type="submit" class="btn btn-primary"><i class="" aria-hidden="true"></i>
                            Update Category</button>

                    </form>

                </div>
                </div>
        </div>
</div>
@endsection
