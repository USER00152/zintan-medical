@extends('layouts.app')

@section('title', 'احجز موعد — منصة الزنتان الطبية')

@section('styles')
<style>
.book-page{max-width:900px;margin:0 auto;padding:36px 28px 60px}
.book-hero{background:linear-gradient(135deg,var(--pdd),var(--p));border-radius:var(--r22);padding:40px;margin-bottom:28px;display:grid;grid-template-columns:1fr auto;gap:24px;align-items:center;position:relative;overflow:hidden}
.book-hero::before{content:'';position:absolute;width:300px;height:300px;border-radius:50%;background:rgba(255,255,255,.06);top:-100px;left:-60px}
.book-hero h2{color:#fff;font-size:26px;font-weight:900;margin-bottom:8px}
.book-hero p{color:rgba(255,255,255,.85);font-size:14px;line-height:1.75}
.book-hero-feats{display:flex;flex-direction:column;gap:8px;margin-top:16px}
.bhf{display:flex;align-items:center;gap:9px;color:rgba(255,255,255,.9);font-size:13px;font-weight:600}
.bhf svg{width:16px;height:16px;fill:none;stroke:currentColor;stroke-width:2.5;stroke-linecap:round;flex-shrink:0}
.book-hero-anim{position:relative;z-index:1}
@keyframes floatDoc{0%,100%{transform:translateY(0)}50%{transform:translateY(-10px)}}
@keyframes heartBeat{0%,100%{transform:scale(1)}20%{transform:scale(1.2)}40%{transform:scale(1)}}
@keyframes drawPulse{to{stroke-dashoffset:0}}
.book-card{background:var(--card);border:1.5px solid var(--bdr);border-radius:var(--r22);padding:36px;box-shadow:var(--s2)}
.grid2{display:grid;grid-template-columns:1fr 1fr;gap:16px}
.grid3{display:grid;grid-template-columns:1fr 1fr 1fr;gap:16px}
.fg{margin-bottom:18px}
.fg label{display:block;font-size:12.5px;font-weight:700;color:var(--td);margin-bottom:7px}
.iw{position:relative}
.iw input,.iw select,.iw textarea{width:100%;padding:13px 13px 13px 42px;border:1.5px solid var(--bdr);border-radius:var(--r8);font-size:14px;color:var(--td);background:var(--bg);font-family:var(--font);transition:.2s}
.iw input:focus,.iw select:focus,.iw textarea:focus{outline:none;border-color:var(--p);background:var(--card);box-shadow:0 0 0 4px rgba(90,174,122,.1)}
.iw-ic{position:absolute;top:50%;left:13px;transform:translateY(-50%);color:var(--tl);pointer-events:none}
.iw-ic svg{width:16px;height:16px;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round}
.bsub{width:100%;padding:16px;background:var(--p);color:#fff;border:none;border-radius:var(--r8);font-size:16px;font-weight:800;cursor:pointer;font-family:var(--font);box-shadow:var(--sp);transition:.25s;margin-top:8px}
.bsub:hover{background:var(--pd);transform:translateY(-2px)}
.bsub.loading{opacity:.7;pointer-events:none}
.trust-row{display:flex;gap:20px;margin-top:16px;justify-content:center;flex-wrap:wrap}
.trust-item{display:flex;align-items:center;gap:7px;font-size:12.5px;color:var(--tm);font-weight:600}
.trust-item svg{width:16px;height:16px;fill:none;stroke:var(--p);stroke-width:2;stroke-linecap:round}
.divider{height:1px;background:var(--bds);margin:24px 0}
.step-info{display:flex;gap:12px;margin-bottom:24px}
.step-badge{width:32px;height:32px;border-radius:50%;background:var(--p);color:#fff;display:flex;align-items:center;justify-content:center;font-size:14px;font-weight:800;flex-shrink:0}
.step-txt h4{font-size:14px;font-weight:700;color:var(--td)}
.step-txt p{font-size:12.5px;color:var(--tm)}
.success-msg{background:#e8f8ee;border:1.5px solid #22a55e;border-radius:var(--r14);padding:24px;text-align:center;display:none;margin-bottom:24px}
.success-msg h3{color:#22a55e;font-size:20px;font-weight:800;margin-bottom:8px}
.success-msg p{color:var(--tb);font-size:14px}
.err-msg{background:#fde8e8;color:#e14b4b;border:1px solid #fbb;border-radius:var(--r8);padding:12px 16px;font-size:13.5px;font-weight:600;margin-bottom:18px;display:none}
.err-msg.show{display:block}
</style>
@endsection

@section('content')
<div class="pg-hd">
  <div class="si"><div class="bc"><span>الرئيسية</span><span>/</span><span class="cur">احجز موعد</span></div><h1>احجز موعدك الطبي</h1><p>خطوة واحدة تفصلك عن موعدك مع أفضل الأطباء</p></div>
</div>

<div class="book-page">
  <div class="book-hero">
    <div>
      <h2>صحتك تستحق الأفضل </h2>
      <p>نحن هنا لمساعدتك في الوصول لأفضل رعاية طبية في مدينة الزنتان. أدخل بياناتك وسنتواصل معك لتأكيد الموعد.</p>
      <div class="book-hero-feats">
        <div class="bhf"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>حجز مجاني بدون رسوم</div>
        <div class="bhf"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>تأكيد خلال 24 ساعة</div>
        <div class="bhf"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>إمكانية الإلغاء في أي وقت</div>
      </div>
    </div>
    <div class="book-hero-anim">
      <svg width="120" height="120" viewBox="0 0 120 120" fill="none" style="animation:floatDoc 3s ease-in-out infinite">
        <circle cx="60" cy="60" r="50" fill="rgba(255,255,255,0.15)"/>
        <path d="M60 80 C60 80 35 65 35 50 C35 41 43 35 51 38 C55 40 58 44 60 49 C62 44 65 40 69 38 C77 35 85 41 85 50 C85 65 60 80 60 80Z" fill="white" style="animation:heartBeat 1.4s ease-in-out infinite;transform-origin:60px 57px"/>
        <polyline points="20,90 30,90 36,82 42,98 48,74 54,88 58,82 62,90 75,90 100,90" fill="none" stroke="rgba(255,255,255,0.8)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="stroke-dasharray:160;stroke-dashoffset:160;animation:drawPulse 2s ease forwards"/>
      </svg>
    </div>
  </div>

  <div class="book-card">
    <div class="success-msg" id="success-msg">
      <h3>تم استلام طلب حجزك! 🎉</h3>
      <p>سيتم التواصل معك على رقم هاتفك لتأكيد الموعد خلال 24 ساعة</p>
    </div>
    <div class="err-msg" id="err-msg"></div>

    <div id="book-form">
      <div class="step-info">
        <div class="step-badge">1</div>
        <div class="step-txt"><h4>بياناتك الشخصية</h4><p>سيتم استخدام هذه البيانات للتواصل معك وتأكيد موعدك</p></div>
      </div>
      <div class="grid2">
        <div class="fg">
          <label>الاسم الكامل *</label>
          <div class="iw"><input type="text" id="inp-name" placeholder="مثال: محمد علي الزنتاني"><span class="iw-ic"><svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg></span></div>
        </div>
        <div class="fg">
          <label>رقم الهاتف *</label>
          <div class="iw"><input type="tel" id="inp-phone" placeholder="09X-XXX-XXXX"><span class="iw-ic"><svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg></span></div>
        </div>
      </div>
      <div class="fg">
        <label>البريد الإلكتروني</label>
        <div class="iw"><input type="email" id="inp-email" placeholder="example@email.com (اختياري)"><span class="iw-ic"><svg viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M2 7l10 7 10-7"/></svg></span></div>
      </div>

      <div class="divider"></div>

      <div class="step-info">
        <div class="step-badge">2</div>
        <div class="step-txt"><h4>تفاصيل الموعد</h4><p>اختر التخصص والعيادة والتاريخ المناسب لك</p></div>
      </div>
      <div class="grid3">
        <div class="fg">
          <label>التخصص المطلوب *</label>
          <select id="inp-spec" style="width:100%;padding:13px;border:1.5px solid var(--bdr);border-radius:var(--r8);font-size:14px;color:var(--td);background:var(--bg);font-family:var(--font)">
            <option value="">اختر التخصص</option>
          </select>
        </div>
        <div class="fg">
          <label>العيادة المفضلة *</label>
          <select id="inp-clinic" style="width:100%;padding:13px;border:1.5px solid var(--bdr);border-radius:var(--r8);font-size:14px;color:var(--td);background:var(--bg);font-family:var(--font)">
            <option value="">اختر العيادة</option>
          </select>
        </div>
        <div class="fg">
          <label>التاريخ المفضل *</label>
          <div class="iw"><input type="date" id="inp-date"><span class="iw-ic"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg></span></div>
        </div>
      </div>

      <div class="fg">
        <label>ملاحظات إضافية (اختياري)</label>
        <textarea id="inp-notes" style="width:100%;padding:13px;border:1.5px solid var(--bdr);border-radius:var(--r8);font-size:14px;color:var(--td);background:var(--bg);font-family:var(--font);resize:vertical;min-height:80px" placeholder="سبب الزيارة، أعراض خاصة، أو أي ملاحظات للطبيب..."></textarea>
      </div>

      <button class="bsub" id="submit-btn" onclick="submitBooking()">احجز الآن 💚</button>

      <div class="trust-row">
        <div class="trust-item"><svg viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>بياناتك آمنة ومشفرة</div>
        <div class="trust-item"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>رد خلال 24 ساعة</div>
        <div class="trust-item"><svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>الحجز مجاني تماماً</div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
async function loadSelects() {
    try {
        const [specRes, clinicRes] = await Promise.all([
            fetch(API + '/specialties', { headers: { 'Accept': 'application/json' } }),
            fetch(API + '/clinics', { headers: { 'Accept': 'application/json' } })
        ]);
        const specs = await specRes.json();
        const clinics = await clinicRes.json();

        const specSel = document.getElementById('inp-spec');
        specs.forEach(function(s) {
            const o = document.createElement('option');
            o.value = s.id; o.textContent = s.name_ar;
            specSel.appendChild(o);
        });

        const clinicSel = document.getElementById('inp-clinic');
        clinics.forEach(function(c) {
            const o = document.createElement('option');
            o.value = c.id; o.textContent = c.name;
            clinicSel.appendChild(o);
        });
    } catch(e) { console.log('تعذر تحميل البيانات'); }
}

async function submitBooking() {
    const name = document.getElementById('inp-name').value.trim();
    const phone = document.getElementById('inp-phone').value.trim();
    const spec = document.getElementById('inp-spec').value;
    const clinic = document.getElementById('inp-clinic').value;
    const date = document.getElementById('inp-date').value;
    const notes = document.getElementById('inp-notes').value.trim();
    const btn = document.getElementById('submit-btn');
    const err = document.getElementById('err-msg');

    err.classList.remove('show');

    if (!name || !phone || !spec || !clinic || !date) {
        err.textContent = 'يرجى تعبئة جميع الحقول المطلوبة (*)';
        err.classList.add('show');
        return;
    }

    btn.textContent = 'جاري الإرسال...';
    btn.classList.add('loading');

    try {
        let currentToken = token;
        if (!currentToken) {
            const regRes = await fetch(API + '/login', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                body: JSON.stringify({ name: name })
            });
            const regData = await regRes.json();
            if (regData.token) {
                currentToken = regData.token;
                localStorage.setItem('token', currentToken);
                localStorage.setItem('user', JSON.stringify(regData.user));
            }
        }

        const docRes = await fetch(API + '/doctors?specialty_id=' + spec, {
            headers: { 'Accept': 'application/json', 'Authorization': 'Bearer ' + currentToken }
        });
        const doctors = await docRes.json();

        if (!doctors.length) {
            err.textContent = 'لا يوجد أطباء متاحون في هذا التخصص حالياً';
            err.classList.add('show');
            btn.textContent = 'احجز الآن 💚';
            btn.classList.remove('loading');
            return;
        }

        const res = await fetch(API + '/appointments', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'Authorization': 'Bearer ' + currentToken },
            body: JSON.stringify({
                doctor_profile_id: doctors[0].id,
                clinic_id: clinic,
                appointment_date: date,
                appointment_time: '09:00',
                notes: notes || 'حجز عبر الموقع - ' + name + ' - ' + phone
            })
        });

        const data = await res.json();

        if (res.ok) {
            document.getElementById('success-msg').style.display = 'block';
            document.getElementById('book-form').style.display = 'none';
            window.scrollTo({top: 0, behavior: 'smooth'});
        } else {
            err.textContent = data.message || 'حدث خطأ، حاول مرة أخرى';
            err.classList.add('show');
            btn.textContent = 'احجز الآن 💚';
            btn.classList.remove('loading');
        }
    } catch(e) {
        err.textContent = 'تعذّر الاتصال بالخادم';
        err.classList.add('show');
        btn.textContent = 'احجز الآن 💚';
        btn.classList.remove('loading');
    }
}

loadSelects();
</script>
@endsection