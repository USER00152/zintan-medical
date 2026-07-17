<!DOCTYPE html>
<html lang="ar" dir="rtl" data-theme="light">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>تسجيل الدخول — منصة الزنتان الطبية</title>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">
<style>
:root{
  --p:#087E8B;--pd:#065f69;--pdd:#044a52;--pl:#e6f5f6;--pll:#f2fafa;
  --td:#0d2b35;--tb:#3d5462;--tm:#7c8ea0;--tl:#b0bec8;
  --bg:#f4f9fa;--card:#fff;--bdr:#d8eaed;
  --r8:8px;--rF:999px;
  --s1:0 2px 10px rgba(8,80,90,.07);--s2:0 8px 28px rgba(8,80,90,.11);
  --sp:0 8px 28px rgba(8,126,139,.28);--tr:.25s cubic-bezier(.4,0,.2,1);
  --font:'Tajawal',sans-serif;
}
*{margin:0;padding:0;box-sizing:border-box}
html,body{font-family:var(--font);direction:rtl;height:100%;overflow:hidden}
button{font-family:inherit;cursor:pointer;border:none;outline:none;background:none}
input{font-family:inherit;outline:none}

.wrap{display:flex;height:100vh;width:100vw}

/* الجانب الأزرق */
.lv{width:42%;background:linear-gradient(160deg,var(--pdd) 0%,var(--p) 55%,#0ab5c2 100%);position:relative;display:flex;flex-direction:column;justify-content:space-between;padding:44px;color:#fff;overflow:hidden}
.lv-c{position:absolute;inset:0;pointer-events:none}
.vc{position:absolute;border-radius:50%;background:rgba(255,255,255,.06)}
.vc1{width:340px;height:340px;top:-110px;right:-90px}
.vc2{width:220px;height:220px;bottom:-70px;left:-50px}
.vc3{width:130px;height:130px;top:42%;left:32%}
.lv-logo{position:relative;z-index:1;display:flex;align-items:center;gap:12px}
.logo-mark{width:44px;height:44px;border-radius:13px;background:rgba(255,255,255,.18);display:flex;align-items:center;justify-content:center}
.logo-mark svg{width:24px;height:24px;fill:none;stroke:#fff;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}
.logo-name{font-size:18px;font-weight:900;color:#fff}
.logo-name span{color:rgba(255,255,255,.7)}
.logo-sub{font-size:10.5px;color:rgba(255,255,255,.5);margin-top:2px}
.lv-body{position:relative;z-index:1}
.lv-illus{margin-bottom:28px}
.lv-illus svg{width:88px;height:88px;filter:drop-shadow(0 8px 20px rgba(0,0,0,.2))}
.lv-body h2{color:#fff;font-size:28px;margin-bottom:12px;font-weight:900;line-height:1.25}
.lv-body p{color:rgba(255,255,255,.78);font-size:14.5px;margin-bottom:28px;line-height:1.75}
.lv-feats{display:flex;flex-direction:column;gap:14px}
.lf-item{display:flex;align-items:center;gap:13px}
.lf-ico{width:38px;height:38px;border-radius:11px;background:rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;flex-shrink:0}
.lf-ico svg{width:19px;height:19px;fill:none;stroke:#fff;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}
.lf-txt{font-size:14px;font-weight:600;color:rgba(255,255,255,.9)}
.lv-foot{position:relative;z-index:1;font-size:12px;color:rgba(255,255,255,.45)}

/* الجانب الأبيض */
.lf{flex:1;display:flex;align-items:center;justify-content:center;padding:48px;background:var(--card);overflow-y:auto}
.lb{width:100%;max-width:440px}
.lb h1{font-size:28px;margin-bottom:6px;color:var(--td);font-weight:900}
.lb-sub{color:var(--tm);font-size:14.5px;margin-bottom:32px;line-height:1.6}
.fg{margin-bottom:24px}
.fg label{display:block;font-size:13px;font-weight:700;color:var(--td);margin-bottom:8px}
.iw{position:relative}
.iw input{width:100%;padding:16px 16px 16px 46px;border:1.5px solid var(--bdr);border-radius:var(--r8);font-size:15px;color:var(--td);background:var(--bg);transition:var(--tr);font-family:var(--font)}
.iw input:focus{border-color:var(--p);background:var(--card);box-shadow:0 0 0 4px rgba(8,126,139,.1)}
.iw-ic{position:absolute;top:50%;left:14px;transform:translateY(-50%);pointer-events:none;color:var(--tl)}
.iw-ic svg{width:18px;height:18px;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}
.btn-login{width:100%;padding:16px;background:var(--p);color:#fff;border:none;border-radius:var(--r8);font-size:16px;font-weight:800;cursor:pointer;font-family:var(--font);transition:var(--tr);box-shadow:var(--sp);margin-bottom:16px}
.btn-login:hover{background:var(--pd);transform:translateY(-1px)}
.btn-login.loading{opacity:.7;pointer-events:none}
.reg-link{text-align:center;margin-top:16px;font-size:14px;color:var(--tm)}
.reg-link span{color:var(--p);font-weight:700;cursor:pointer}
.divider{display:flex;align-items:center;gap:12px;margin:20px 0;color:var(--tl);font-size:12.5px}
.divider::before,.divider::after{content:'';flex:1;height:1px;background:var(--bdr)}
.soc{width:100%;padding:13px;border:1.5px solid var(--bdr);border-radius:var(--r8);font-size:14px;font-weight:700;color:var(--td);background:var(--card);display:flex;align-items:center;justify-content:center;gap:10px;cursor:pointer;transition:var(--tr);font-family:var(--font)}
.soc:hover{border-color:var(--p);background:var(--pl);color:var(--p)}
.soc svg{width:19px;height:19px;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}
.err-msg{background:#fde8e8;color:#e14b4b;border:1px solid #fbb;border-radius:var(--r8);padding:12px 16px;font-size:13.5px;font-weight:600;margin-bottom:20px;display:none}
.err-msg.show{display:block}
.hint{font-size:12.5px;color:var(--tm);margin-top:8px;line-height:1.6}
</style>
</head>
<body>
<div class="wrap">

  <!-- الجانب الأزرق -->
  <aside class="lv">
    <div class="lv-c">
      <div class="vc vc1"></div>
      <div class="vc vc2"></div>
      <div class="vc vc3"></div>
    </div>
    <div class="lv-logo">
      <div class="logo-mark">
        <svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
      </div>
      <div>
        <div class="logo-name">منصة <span>الزنتان</span></div>
        <div class="logo-sub">Zintan Medical Platform</div>
      </div>
    </div>
    <div class="lv-body">
      <div class="lv-illus">
        <svg viewBox="0 0 80 80" fill="none">
          <rect x="8" y="8" width="64" height="64" rx="18" stroke="white" stroke-width="2" fill="rgba(255,255,255,.1)"/>
          <path d="M40 24v32M24 40h32" stroke="white" stroke-width="3" stroke-linecap="round"/>
          <circle cx="40" cy="40" r="16" stroke="white" stroke-width="1.5" fill="none" opacity=".5"/>
        </svg>
      </div>
      <h2>صحتك أولويتنا،<br>وموعدك بضغطة زر</h2>
      <p>احجز مواعيدك مع أفضل الأطباء في مدينة الزنتان بكل سهولة وأمان.</p>
      <div class="lv-feats">
        <div class="lf-item"><div class="lf-ico"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg></div><div class="lf-txt">حجز المواعيد إلكترونياً دون انتظار</div></div>
        <div class="lf-item"><div class="lf-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg></div><div class="lf-txt">نخبة من أطباء مدينة الزنتان</div></div>
        <div class="lf-item"><div class="lf-ico"><svg viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg></div><div class="lf-txt">بياناتك الطبية محمية وآمنة</div></div>
        <div class="lf-item"><div class="lf-ico"><svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></div><div class="lf-txt">عيادات في أحياء مدينة الزنتان</div></div>
      </div>
    </div>
    <div class="lv-foot">© 2026 منصة الزنتان الطبية — مشروع تخرج</div>
  </aside>

  <!-- الجانب الأبيض -->
  <main class="lf">
    <div class="lb">
      <h1>مرحباً بك </h1>
      <p class="lb-sub">أدخل اسمك للدخول إلى حسابك</p>

      <div class="err-msg" id="err-msg">الاسم غير موجود</div>

      <div class="fg">
        <label>الاسم</label>
        <div class="iw">
          <input type="text" id="inp-name" placeholder="أدخل اسمك الكامل" autocomplete="name">
          <span class="iw-ic"><svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg></span>
        </div>
        <p class="hint">مثال: محمد علي، سارة إبراهيم</p>
      </div>

      <button class="btn-login" id="btn-login" onclick="doLogin()">دخول</button>

      <div class="reg-link">
        ليس لديك حساب؟ <span onclick="window.location.href='/register'">سجّل الآن</span>
      </div>

      <div class="divider">أو</div>

      <button class="soc">
        <svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.79 19.79 0 0 1 2.12 4.18 2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        الدخول برقم الهاتف
      </button>
    </div>
  </main>
</div>

<script>
const API = 'http://127.0.0.1:8000/api';

if (localStorage.getItem('token')) {
    window.location.href = '/home';
}

async function doLogin() {
    const name = document.getElementById('inp-name').value.trim();
    const btn  = document.getElementById('btn-login');
    const err  = document.getElementById('err-msg');

    if (!name) {
        err.textContent = 'يرجى إدخال اسمك';
        err.classList.add('show');
        return;
    }

    btn.textContent = 'جاري الدخول...';
    btn.classList.add('loading');
    err.classList.remove('show');

    try {
        const res = await fetch(API + '/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ name: name })
        });

        const data = await res.json();

        if (res.ok && data.token) {
            localStorage.setItem('token', data.token);
            localStorage.setItem('user', JSON.stringify(data.user));
            window.location.href = '/home';
        } else {
            err.textContent = data.message || 'الاسم غير موجود، تأكد من اسمك';
            err.classList.add('show');
            btn.textContent = 'دخول';
            btn.classList.remove('loading');
        }
    } catch (e) {
        err.textContent = 'تعذّر الاتصال بالخادم، تأكد من تشغيل السيرفر';
        err.classList.add('show');
        btn.textContent = 'دخول';
        btn.classList.remove('loading');
    }
}

document.addEventListener('keydown', e => {
    if (e.key === 'Enter') doLogin();
});
</script>
</body>
</html>