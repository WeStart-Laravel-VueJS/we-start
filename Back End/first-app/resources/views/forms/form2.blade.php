@extends('forms.bootstrap')

@section('css')
<style>
    .rokect svg {
        animation: rocket 1.3s ease infinite;
    }

    @keyframes rocket {
        from {
            transform: translate(-3px, 3px);
        }

        to {
            transform: translate(20px, -30px);
        }
    }
</style>
@endsection
@section('content')

    <div class="container my-5">
        <h1>Full Information Form</h1>
        <x-errors />
        <form action="{{ route('forms.form2') }}" method="POST">
            @csrf

            <x-input text="Your Name" type="text" name="name"  />

            <x-input text="Your Email" type="email" name="email"  />

            <x-input text="Date of Birth" type="date" name="dob"  />

            <x-input text="Graduation Date" type="date" name="graduation"  />

            <div class="mb-3">
                <label>Gender</label> <br>
                <x-radio text="Male" name="gender"  />
                <x-radio text="Female" name="gender"  />
            </div>

            <div class="mb-3">
                <label>Skills</label> <br>
                <x-checkbox text="HTML" name="skills[]"  /> <br>
                <x-checkbox text="CSS" name="skills[]"  />
            </div>
            @php
                $options = [
                    'phd' => 'pHD',
                    'master' => 'Master',
                    'bachelor' => 'Bachelor', 'diplome' => 'Diplome',
                    'school' => 'School'
                ];
            @endphp
            <x-select text="Education Level" name="education" :options="$options" placeholder="Education Level" />

            <x-textarea text="Bio" name="bio" class="tiny" />

            <button type="button" class="btn btn-dark px-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                  </svg>
                   Send</button>
        </form>
    </div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.6.0/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '.tiny'
    })

    let btn = document.querySelector('button');
    let form = document.querySelector('form');
    btn.onclick = () => {
        btn.classList.add('rokect')
        setTimeout(() => {
            form.submit();
        }, 1100);
    }
</script>
@stop
