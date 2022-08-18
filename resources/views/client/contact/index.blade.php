@extends('client.layouts.layout')
@section('title', 'Liên Hệ')
@section('content')
    <div class="container">
        <div class="content mb-3">
            <div class="title_contact mt-3 mb-3">
                <h4>Liên Hệ</h4>
            </div>
            <div class="main_contact">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.886571846808!2d106.80209691478356!3d20.95706979559805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a63648e853663%3A0x4068c3391cc7a7f2!2zQsO5aSBUaeG6v24gSHV5!5e0!3m2!1svi!2s!4v1658589307551!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-contact">
                            <div class="title-form">
                                <h5>Liên Hệ Với Chúng Tôi</h5>
                            </div>
                            <div class="form">
                                <form action="{{route('contact-store')}}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="">Họ Và Tên</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" name="email">
                                    </div>
                                 
                                    <div class="mb-3">
                                        <label for="">Lời Nhắn</label>
                                       <textarea name="content" class="form-control" id="" cols="20" rows="5"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary">Gửi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
