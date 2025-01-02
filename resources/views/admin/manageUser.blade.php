<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    
</head>

<body>
    @include('admin.header')

    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h1 class="no-margin-bottom">Manage User</h1>
                    <div class="d-flex justify-content-center mt-4">
                        <form action="{{url('updateUser',  $user->id)}}" method="post" class="d-flex flex-column align-items-center">
                            @method('put')
                            @csrf
                            <!-- Name Field -->
                            <div class="form-group mb-3 w-100">
                                <input 
                                    type="text" 
                                    name="name" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    placeholder="Enter user name" 
                                    required
                                    value="{{ old('name', $user->name) }}"
                                >
                                @error('name')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        
                            <!-- Email Field -->
                            <div class="form-group mb-3 w-100">
                                <input 
                                    type="email" 
                                    name="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    placeholder="Enter user email" 
                                    required
                                    value="{{ old('email', $user->email) }}"
                                >
                                @error('email')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        
                            <!-- Phone Field -->
                            <div class="form-group mb-3 w-100">
                                <input 
                                    type="text" 
                                    name="phone" 
                                    class="form-control @error('phone') is-invalid @enderror" 
                                    placeholder="Enter user phone (optional)" 
                                    value="{{ old('phone', $user->phone) }}"
                                >
                                @error('phone')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        
                            <!-- Address Field -->
                            <div class="form-group mb-3 w-100">
                                <input 
                                    type="text" 
                                    name="address" 
                                    class="form-control @error('address') is-invalid @enderror" 
                                    placeholder="Enter user address (optional)" 
                                    value="{{ old('address', $user->address) }}"
                                >
                                @error('address')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        
                            <!-- User Type Field -->
                            <div class="form-group mb-3 w-100">
                                <select 
                                    name="usertype" 
                                    class="form-select form-control @error('usertype') is-invalid @enderror" 
                                    required
                                >
                                    <option value="" disabled selected>Select user type</option>
                                    <option value="admin" {{ old('usertype', $user->usertype) == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="customer" {{ old('usertype', $user->usertype) == 'customer' ? 'selected' : '' }}>Customer</option>
                                    
                                </select>
                                @error('usertype')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        
                            <!-- Submit Button -->
                            <div class="form-group mb-3 w-100">
                                <input class="btn btn-primary" type="submit" value="Update User">
                            </div>
                        </form>
                        
                        
                        
                        
                    </div>
                    
                </div>

                
            </div>
            
                
            
           

        </div>
        

            
            
            <footer class="footer">
                <div class="footer__block block no-margin-bottom">
                    <div class="container-fluid text-center">
                        <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                        <p class="no-margin-bottom">2018 &copy; Your company. Download From <a target="_blank"
                                href="https://templateshub.net">Templates Hub</a>.</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- JavaScript files-->
    <script src="{{ asset('admintemplate/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admintemplate/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admintemplate/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admintemplate/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admintemplate/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admintemplate/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admintemplate/js/charts-home.js') }}"></script>
    <script src="{{ asset('admintemplate/js/front.js') }}"></script>


</body>

</html>
