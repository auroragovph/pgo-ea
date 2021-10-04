<x-ui.card title="Create User">
    <form id="ajax_form" action="{{ route('user.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <x-ui.form.input label="Last Name" name="last_name" />
            </div>
            <div class="col-md-6">
                <x-ui.form.input label="First Name" name="first_name" />
            </div>
            <div class="col-md-12">
                <x-ui.form.input label="Middle Name" name="middle_name" />
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <x-ui.form.input label="Office" name="office" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <x-ui.form.input label="Username" name="username" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <x-ui.form.input label="Password" type="password" name="password" />
            </div>
            <div class="col-md-6">
                <x-ui.form.input label="Confirm Password" type="password" name="password_confirmation" />
            </div>
        </div>

        <hr>

        <button class="btn btn-primary">Submit</button>

       

    </form>
</x-ui.card>