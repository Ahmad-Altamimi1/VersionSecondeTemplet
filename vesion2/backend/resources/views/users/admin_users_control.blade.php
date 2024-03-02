@extends('layouts.dashboard')

@section('content')
    <script src="{{ asset('js/main.js') }}"></script>

    <section class="hk-sec-wrapper text-right">
        <!-- Row -->
        <div dir="rtl" class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">قائمة أعضاء الموقع</h5>
                    <p class="mb-40">تعين الصلاحيات</p>
                    <p class="">محرر مواضيع : يستطيع انشاء مواضيع ونشر البوستات والفيديوهات</p>
                    <p class="">محرر مقالات وفيدوهات : يستطيع نشر البوستات والفيديوهات</p>
                    <p class="">محرر برامج : يستطيع برامج وادارتها</p>

                    <div style="color: red ; padding-right:30px;" id="usermessage">
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <table id="datable_1" class="table table-hover w-100 display pb-30">
                                    <thead>
                                        <tr>
                                            <th>الإسم</th>
                                            <th>الإيميل</th>
                                            <th>مشرف الموقع</th>
                                            <th>محرر مواضيع</th>
                                            <th>محرر مقالات وفيدوهات</th>
                                            <th>محرر برامج</th>
                                            <th>عدد المقالات</th>
                                            <th>عدد الفيديوهات</th>
                                            <th>عدد المواضيع</th>
                                            <th>عدد البرامج</th>
                                            <th>عدد حلقات للبرامج</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($users as $singleuser)
                                            <tr>
                                                <td>{{ $singleuser->name }}</td>
                                                <td>{{ $singleuser->email }}</td>
                                                <?php
                                                if ($singleuser->admin) {
                                                    $st = 'checked';
                                                } else {
                                                    $st = '';
                                                }
                                                echo '<td class="text-center"> 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <input id="myCheckbox" type="checkbox" class="new-control-input" ' .
                                                    $st .
                                                    ' onchange="editB(this,\'' .
                                                    $singleuser->id .
                                                    '\',\'admin\',\'مشرف الموقع\',\'' .
                                                    $singleuser->name .
                                                    '\')" >
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     </td>'; ?>
                                                <?php
                                                if ($singleuser->B0) {
                                                    $st = 'checked';
                                                } else {
                                                    $st = '';
                                                }
                                                echo '<td class="text-center"> 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <input id="myCheckbox" type="checkbox" class="new-control-input" ' .
                                                    $st .
                                                    ' onchange="editB(this,\'' .
                                                    $singleuser->id .
                                                    '\',\'B0\',\'محرر مواضيع\',\'' .
                                                    $singleuser->name .
                                                    '\')" >
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          </td>'; ?>
                                                <?php
                                                if ($singleuser->B1) {
                                                    $st = 'checked';
                                                } else {
                                                    $st = '';
                                                }
                                                echo '<td class="text-center"> 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           <input id="myCheckbox" type="checkbox" class="new-control-input" ' .
                                                    $st .
                                                    ' onchange="editB(this,\'' .
                                                    $singleuser->id .
                                                    '\',\'B1\',\'محرر مقالات وفيدوهات\',\'' .
                                                    $singleuser->name .
                                                    '\')" >
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </td>'; ?>
                                                <?php
                                                if ($singleuser->B2) {
                                                    $st = 'checked';
                                                } else {
                                                    $st = '';
                                                }
                                                echo '<td class="text-center"> 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       <input id="myCheckbox" type="checkbox" class="new-control-input" ' .
                                                    $st .
                                                    ' onchange="editB(this,\'' .
                                                    $singleuser->id .
                                                    '\',\'B2\',\'محرر برامج\',\'' .
                                                    $singleuser->name .
                                                    '\')" >
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </td>'; ?>

                                                <td>
                                                    <?php
                                                    $ee = 0;
                                                    ?>
                                                    @foreach ($posts as $single)
                                                        <?php
                                                        if ($single->WRITER == $singleuser->id) {
                                                            $ee++;
                                                        }
                                                        ?>
                                                    @endforeach
                                                    {{ $ee }}
                                                </td>
                                                <td>
                                                    <?php
                                                    $ee = 0;
                                                    ?>
                                                    @foreach ($videos as $single)
                                                        <?php
                                                        if ($single->WRITER == $singleuser->id) {
                                                            $ee++;
                                                        }
                                                        ?>
                                                    @endforeach
                                                    {{ $ee }}
                                                </td>
                                                <td>
                                                    <?php
                                                    $ee = 0;
                                                    ?>
                                                    @foreach ($tags as $single)
                                                        <?php
                                                        if ($single->WRITER == $singleuser->id) {
                                                            $ee++;
                                                        }
                                                        ?>
                                                    @endforeach
                                                    {{ $ee }}
                                                </td>
                                                <td>
                                                    <?php
                                                    $ee = 0;
                                                    ?>
                                                    @foreach ($programs as $single)
                                                        <?php
                                                        if ($single->WRITER == $singleuser->id) {
                                                            $ee++;
                                                        }
                                                        ?>
                                                    @endforeach
                                                    {{ $ee }}
                                                </td>
                                                <td>
                                                    <?php
                                                    $ee = 0;
                                                    ?>
                                                    @foreach ($programsvideos as $single)
                                                        <?php
                                                        if ($single->WRITER == $singleuser->id) {
                                                            $ee++;
                                                        }
                                                        ?>
                                                    @endforeach
                                                    {{ $ee }}
                                                </td>
                                                

                                            </tr>
                                        @endforeach


                                    <tfoot>
                                        <tr>
                                            <th>الإسم</th>
                                            <th>الإيميل</th>
                                            <th>مشرف الموقع</th>
                                            <th>محرر مواضيع</th>
                                            <th>محرر مقالات وفيدوهات</th>
                                            <th>محرر برامج</th>
                                            <th>عدد المقالات</th>
                                            <th>عدد الفيديوهات</th>
                                            <th>عدد المواضيع</th>
                                            <th>عدد البرامج</th>
                                            <th>عدد حلقات للبرامج</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- /Row -->


    </section>
@endsection
