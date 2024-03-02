@extends('layouts.welcome')

@section('content')

    <div class="tm-top-a-box tm-full-width tm-box-bg-1 " dir="rtl">
        <div class="uk-container uk-container-center" style=" ">
            <section id="tm-top-a" class="tm-top-a uk-grid uk-grid-collapse" data-uk-grid-match="{target:'> div > .uk-panel'}"
                data-uk-grid-margin="" style="height: 0 !important">

                <div class="uk-width-1-1 uk-row-first">
                    <div class="uk-panel">
                        <?php $pic = 'main_page/images/اللوجو المعتمد.png/' ?>
                        <div class="uk-cover-background uk-position-relative head-wrap"
                            style="height: 290px; background-image: url('');">

                            <img class="" src="{{ asset($pic) }}" alt="" height="290"
                                width="1920" style="z-index: 0; position: relative; opacity: 0.8;  max-width: 63%">
                            <div class="uk-position-cover uk-flex uk-flex-center head-title">
                                {{-- <h1>{{ $post->TITLE }}</h1> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="uk-container uk-container-center alt" dir="rtl" style="position: relative;z-index: 1">
        <ul class="uk-breadcrumb">
            <li><a href="{{ url('/') }}">الصفحة الرئيسية</a></li>
            <li><a href="/aboutus" style="color: white">
                    من نحن
                </a></li>
        </ul>
    </div>



    <div class="uk-container uk-container-center" style="   z-index: 1;
    position: relative;" dir="rtl">
        <div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
            <div class="tm-main uk-width-medium-4-4 uk-push-4-4">

                <p style="text-align: right;"><strong>منصة طبكم هي منصة إعلامية رقمية تعمل على نشر رسالتها في تعزيز ورفع الوعي الصحي والثقافة الصحية للمستخدم العربي. </strong></p>
                <p style="text-align: right;"><strong>نقدم في طبكم العديد من البرامج والمحتويات المعرفية الصحية لمساعدتك في الحفاظ على صحتك.</strong></p>
                <p style="text-align: right;">&nbsp;</p>
                {{-- <h3 style="text-align: right;"><strong>ملاحظات مهمة عن الموقع:</strong></h3> --}}
                <p style="text-align: right;"><strong>تهدف منصة طبكم إلى توفير معلومات صحية دقيقة وموثوقة للمستخدمين العرب، وذلك من خلال استخدام الوسائط المتعددة لنشر المحتوى، بما في ذلك النصوص والصور ومقاطع الفيديو، مع التأكيد على أن المواد المنشورة لا تغني عن مراجعة الطبيب المختص.</strong></p>
                <p style="text-align: right;"><strong>تمتد خدماتنا في طبكم إلى مجموعة واسعة من المواضيع الصحية، بما في ذلك الوقاية من الأمراض، والرعاية الصحية اليومية، والتغذية الصحية، واللياقة البدنية، والصحة العقلية، وغيرها الكثير.&nbsp;</strong></p>
                <p style="text-align: right;"><strong>نحن نعمل بجد لتوفير المعلومات الصحية الأكثر تحديثًا وشمولية لمساعدتك في اتخاذ قرارات صحية مدروسة.</strong></p>
                <p style="text-align: right;"><strong>تعد منصة طبكم منصة رقمية مبتكرة وموثوقة، تحترم خصوصية مستخدمينا وتعمل على توفير تجربة استخدام سهلة وآمنة لكافة المستخدمين. </strong></p>
                <p style="text-align: right;"><strong>نحن نتعاون مع فريق من الأطباء والخبراء في مجال الصحة لتقديم محتوى موثوق للمستخدمين.&nbsp;</strong></p>
                <p style="text-align: right;"><strong>في منصة طبكم، نؤمن بأهمية التوعية الصحية وقدرة المعلومات على تحسين حياة الأفراد، نود أن نكون شريكًا لك في رحلتك نحو صحة أفضل وحياة أكثر سعادة ورفاهية.</strong>
                </p>
                <p style="text-align: right;">&nbsp;</p>
                <p style="text-align: right;"><strong>تابع محتوى طبكم وانضم إلينا اليوم واستمتع بالمحتوى الصحي الشامل والموثوق.</strong></p>
                <p style="text-align: right;">&nbsp;</p>


            </div>

        </div>
    </div>
@endsection
