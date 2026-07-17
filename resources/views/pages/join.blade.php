@extends('layouts.app')

@section('title', 'انضم إلينا — منصة الزنتان الطبية')

@section('styles')
<style>
.join-page{max-width:860px;margin:0 auto;padding:36px 28px 60px}
.join-hero{background:linear-gradient(135deg,var(--pdd),var(--p));border-radius:var(--r22);padding:44px;margin-bottom:28px;position:relative;overflow:hidden;text-align:center}
.join-hero::before{content:'';position:absolute;width:300px;height:300px;border-radius:50%;background:rgba(255,255,255,.06);top:-100px;left:-80px}
.join-hero::after{content:'';position:absolute;width:200px;height:200px;border-radius:50%;background:rgba(255,255,255,.04);bottom:-60px;right:-40px}
.join-hero h1{color:#fff;font-size:28px;font-weight:900;margin-bottom:10px;position:relative;z-index:1}
.join-hero p{color:rgba(255,255,255,.85);font-size:15px;line-height:1.75;position:relative;z-index:1;max-width:500px;margin:0 auto}
.type-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-bottom:28px}
.type-card{background:var(--card);border:2px solid var(--bdr);border-radius:var(--r14);padding:20px;text-align:center;cursor:pointer;transition:.2s}
.type-card.on{border-color:var(--p);background:var(--pl)}
.type-card:hover{border-color:var(--p)}
.type-card svg{width:32px;height:32px;fill:none;stroke:var(--tm);stroke-width:1.8;stroke-linecap:round;margin-bottom:10px;transition:.2s}
.type-card.on svg{stroke:var(--p)}
.type-card h4{font-size:14px;font-weight:800;color:var(--td);margin-bottom:4px}
.type-card p{font-size:12px;color:var(--tm)}
.form-card{background:var(--card);border:1.5px solid var(--bdr);border-radius:var(--r22);padding:36px;box-shadow:var(--s2)}
.grid2{display:grid;grid-template-columns:1fr 1fr;gap:16px}
.fg{margin-bottom:18px}
.fg label{display:block;font-size:12.5px;font-weight:700;color:var(--td);margin-bottom:7px}
.fg input,.fg select,.fg textarea{width:100%;padding:13px 14px;border:1.5px solid var(--bdr);border-radius:var(--r8);font-size:14px;color:var(--td);background:var(--bg);font-family:var(--font);transition:.2s}
.fg input:focus,.fg select:focus,.fg textarea:focus{outline:none;border-color:var(--p);background:var(--card);box-shadow:0 0 0 4px rgba(178,221,184,.12)}
.submit-btn{width:100%;padding:16px;background:var(--p);color:#fff;border:none;border-radius:var(--r8);font-size:16px;font-weight:800;cursor:pointer;font-family:var(--font);box-shadow:var(--sp);transition:.25s;margin-top:8px}
.submit-btn:hover{background:var(--pd);transform:translateY(-2px)}
.divider{height:1px;background:var(--bds);margin:24px 0}
.step-info{display:flex;gap:12px;margin-bottom:24px;align-items:flex-start}
.step-badge{width:30px;height:30px;border-radius:50%;background:var(--p);color:#fff;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:800;flex-shrink:0;margin-top:2px}
.step-txt h4{font-size:14px;font-weight:700;color:var(--td)}
.step-txt p{font-size:12.5px;color:var(--tm)}
.success-box{background:#e8f8ee;border:1.5px solid #22a55e;border-radius:var(--r14);padding:28px;text-align:center}
.success-box h3{color:#22a55e;font-size:20px;font-weight:800;margin-bottom:8px}
.success-box p{color:var(--tm);font-size:14px}
</style>
@endsection

@section('content')
<div class="pg-hd">
  <div class="si">
    <div class="bc"><span>الرئيسية</span><span>/</span><span class="cur">انضم إلينا</span></div>
    <h1>انضم إلى منصة الزنتان</h1>
    <p>نرحب بانضمامكم لتطوير الرعاية الصحية في مدينة الزنتان</p>
  </div>
</div>

<div class="join-page">

  <div class="join-hero">
    <h1>معاً نبني مستقبل صحي أفضل 💚</h1>
    <p>نسعى لتقديم رعاية صحية ممتازة بأقل تكلفة ممكنة — انضم إلينا وكن جزءاً من هذه الرحلة</p>
  </div>

  @if(session('success'))
  <div class="success-box" style="margin-bottom:24px">
    <h3>تم استلام طلبك بنجاح! 🎉</h3>
    <p>{{ session('success') }}</p>
    <a href="{{ route('home') }}" class="btn bp" style="margin-top:16px;display:inline-flex">العودة للرئيسية</a>
  </div>
  @else

  {{-- اختيار نوع الانضمام --}}
  <div class="type-grid" id="type-grid">
    <div class="type-card on" onclick="selectType('doctor', this)">
      <svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
      <h4>طبيب</h4>
      <p>انضم كطبيب متخصص</p>
    </div>
    <div class="type-card" onclick="selectType('clinic', this)">
      <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><path d="M9 22V12h6v10"/></svg>
      <h4>مصحة / مستشفى</h4>
      <p>شراكة استراتيجية</p>
    </div>
    <div class="type-card" onclick="selectType('center', this)">
      <svg viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
      <h4>مركز صحي</h4>
      <p>تعاون لخدمة المجتمع</p>
    </div>
  </div>

  <form class="form-card" action="{{ route('join.store') }}" method="POST">
    @csrf
    <input type="hidden" name="type" id="join-type" value="doctor">

    <div class="step-info">
      <div class="step-badge">1</div>
      <div class="step-txt"><h4>البيانات الأساسية</h4><p>معلومات التواصل والتعريف</p></div>
    </div>

    <div class="grid2">
      <div class="fg">
        <label>الاسم الكامل *</label>
        <input type="text" name="name" placeholder="مثال: د. أحمد الزنتاني" required>
      </div>
      <div class="fg">
        <label>رقم الهاتف *</label>
        <input type="tel" name="phone" placeholder="09X-XXX-XXXX" required>
      </div>
    </div>

    <div class="fg">
      <label>البريد الإلكتروني</label>
      <input type="email" name="email" placeholder="example@email.com (اختياري)">
    </div>

    <div class="divider"></div>

    <div class="step-info">
      <div class="step-badge">2</div>
      <div class="step-txt"><h4>التفاصيل المهنية</h4><p>معلومات عن تخصصك أو مؤسستك</p></div>
    </div>

    <div class="grid2">
      <div class="fg">
        <label>التخصص / نوع المؤسسة *</label>
        <select name="specialty" required>
          <option value="">اختر...</option>
          <optgroup label="الأطباء">
            <option>باطنة</option>
            <option>أسنان</option>
            <option>أطفال</option>
            <option>جلدية</option>
            <option>عيون</option>
            <option>عظام</option>
            <option>نساء وتوليد</option>
            <option>أنف وأذن</option>
            <option>تخصص آخر</option>
          </optgroup>
          <optgroup label="المؤسسات">
            <option>مصحة خاصة</option>
            <option>مستشفى</option>
            <option>مركز صحي</option>
            <option>عيادة تخصصية</option>
          </optgroup>
        </select>
      </div>
      <div class="fg">
        <label>سنوات الخبرة</label>
        <select name="experience">
          <option>أقل من سنة</option>
          <option>1-3 سنوات</option>
          <option>3-5 سنوات</option>
          <option>5-10 سنوات</option>
          <option>أكثر من 10 سنوات</option>
        </select>
      </div>
    </div>

    <div class="fg">
      <label>العنوان في الزنتان *</label>
      <input type="text" name="address" placeholder="مثال: شارع الجمهورية، حي المطار..." required>
    </div>

    <div class="fg">
      <label>نبذة مختصرة</label>
      <textarea name="bio" rows="3" placeholder="عرّف بنفسك أو بمؤسستك بإيجاز..."></textarea>
    </div>

    <div class="divider"></div>

    <div class="step-info">
      <div class="step-badge">3</div>
      <div class="step-txt"><h4>أوقات التواصل المفضلة</h4><p>متى يمكننا الاتصال بك لمناقشة التفاصيل؟</p></div>
    </div>

    <div class="grid2">
      <div class="fg">
        <label>أفضل وقت للتواصل</label>
        <select name="contact_time">
          <option>الصباح (8 - 12)</option>
          <option>الظهيرة (12 - 3)</option>
          <option>العصر (3 - 6)</option>
          <option>المساء (6 - 9)</option>
          <option>أي وقت</option>
        </select>
      </div>
      <div class="fg">
        <label>طريقة التواصل المفضلة</label>
        <select name="contact_method">
          <option>واتساب</option>
          <option>مكالمة هاتفية</option>
          <option>البريد الإلكتروني</option>
        </select>
      </div>
    </div>

    <button type="submit" class="submit-btn">إرسال طلب الانضمام 💚</button>

    <div style="display:flex;gap:20px;margin-top:16px;justify-content:center;flex-wrap:wrap">
      <div style="display:flex;align-items:center;gap:7px;font-size:12.5px;color:var(--tm);font-weight:600">
        <svg width="15" height="15" fill="none" stroke="var(--p)" stroke-width="2" stroke-linecap="round" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
        بياناتك محفوظة وآمنة
      </div>
      <div style="display:flex;align-items:center;gap:7px;font-size:12.5px;color:var(--tm);font-weight:600">
        <svg width="15" height="15" fill="none" stroke="var(--p)" stroke-width="2" stroke-linecap="round" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        رد خلال 24-48 ساعة
      </div>
      <div style="display:flex;align-items:center;gap:7px;font-size:12.5px;color:var(--tm);font-weight:600">
        <svg width="15" height="15" fill="none" stroke="var(--p)" stroke-width="2" stroke-linecap="round" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        أو تواصل مباشرة عبر واتساب
      </div>
    </div>

    <div style="text-align:center;margin-top:16px">
      <a href="https://wa.me/218931488889" target="_blank" style="display:inline-flex;align-items:center;gap:8px;padding:12px 24px;background:#25D366;color:#fff;border-radius:12px;font-size:14px;font-weight:800;text-decoration:none">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="#fff"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        تواصل عبر واتساب مباشرة
      </a>
    </div>
  </form>
  @endif
</div>
@endsection

@section('scripts')
<script>
function selectType(type, card) {
    document.querySelectorAll('.type-card').forEach(function(c){c.classList.remove('on')});
    card.classList.add('on');
    document.getElementById('join-type').value = type;
}
</script>
@endsection