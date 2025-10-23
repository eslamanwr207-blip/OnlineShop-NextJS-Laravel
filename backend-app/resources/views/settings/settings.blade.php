@extends('dashboard.layouts.main_sidebar')

@push('styles')
    <style>
        #settings{
            text-align: right;
        }

        #settings label{
            margin-right: 5px;
        }
    </style>
@endpush


@section('content')
    <!-- row -->
    <div class="row"  style="width: 90%;  margin: auto; margin-top: 40px;" >
        @if ($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif

        <h1>الاعدادات</h1>

        <form action="{{ route('settings.update', $settings->id) }}" method="post" enctype="multipart/form-data"
              style="width: 100%;"
              >
            @csrf
            @method('PUT')

            <div class="mb-3" id="settings">
                <label for="titleInput" class="form-label">العنوان</label>
                <input type="text" name="title" class="form-control" id="titleInput" placeholder="Title" value="{{ old('title', $settings->title) }}">
            </div>

            <div class="mb-3" id="settings">
                <label for="logoInput" class="form-label">شعار الموقع</label>
                <input class="form-control" name="logo" type="file" id="logoInput">
            </div>

            <div class="mb-3" id="settings">
                <label for="faviconInput" class="form-label">ايقونة الموقع</label>
                <input class="form-control" name="favicon" type="file" id="faviconInput">
            </div>

            <div class="mb-3" id="settings">
                <label for="emailInput" class="form-label">البريد الالكتروني</label>
                <input type="email" name="email" class="form-control" id="emailInput" placeholder="Email" value="{{ old('email', $settings->email) }}">
            </div>

            <div class="mb-3" id="settings">
                <label for="facebookInput" class="form-label">رابط الفيسبوك</label>
                <input type="text" name="facebook" class="form-control" id="facebookInput" placeholder="Facebook" value="{{ old('facebook', $settings->facebook) }}">
            </div>

            <div class="mb-3" id="settings">
                <label for="descriptionTextarea" class="form-label">وصف الموقع</label>
                <textarea class="form-control" name="description" id="descriptionTextarea" rows="3">{{ old('description', $settings->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-success" style="padding: 5px; width: 100%; margin-bottom: 10px" >ادخال</button>
        </form>
    </div>
    <!-- row closed -->
@endsection


