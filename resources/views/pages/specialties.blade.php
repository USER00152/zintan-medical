@extends('layouts.app')

@section('title', 'التخصصات — منصة الزنتان الطبية')

@section('styles')
<style>
.sp-grid2{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;margin-bottom:36px}
.sp-card{background:var(--card);border:1.5px solid var(--bdr);border-radius:var(--r22);padding:22px 12px;text-align:center;transition:.25s;cursor:pointer;position:relative;overflow:hidden}
.sp-card:hover,.sp-card.on{border-color:var(--p);box-shadow:var(--s2);transform:translateY(-4px)}
.sp-card.on{background:var(--pl)}
.sp-ico{width:64px;height:64px;margin:0 auto 12px;border-radius:18px;background:var(--pl);display:flex;align-items:center;justify-content:center;transition:.3s;position:relative}
.sp-ico svg{width:36px;height:36px;transition:.3s}
.sp-card:hover .sp-ico,.sp-card.on .sp-ico{background:linear-gradient(135deg,var(--p),var(--pd));box-shadow:0 6px 18px rgba(90,174,122,.35)}
.sp-card:hover .sp-ico svg,.sp-card.on .sp-ico svg{filter:brightness(10)}
.sp-card h4{font-size:13.5px;font-weight:700;color:var(--td);margin-bottom:3px}
.sp-card span{font-size:11px;color:var(--tm)}

/* أيقونة SVG لكل تخصص — ألوان ديفولت */
.ico-heart{fill:none;stroke:#e74c3c;stroke-width:1.8;stroke-linecap:round}
.ico-bone{fill:none;stroke:#8B7355;stroke-width:1.8;stroke-linecap:round}
.ico-brain{fill:none;stroke:#9B59B6;stroke-width:1.8;stroke-linecap:round}
.ico-tooth{fill:none;stroke:#3498DB;stroke-width:1.8;stroke-linecap:round}
.ico-eye{fill:none;stroke:#1ABC9C;stroke-width:1.8;stroke-linecap:round}
.ico-skin{fill:none;stroke:#F39C12;stroke-width:1.8;stroke-linecap:round}
.ico-lungs{fill:none;stroke:#2980B9;stroke-width:1.8;stroke-linecap:round}
.ico-baby{fill:none;stroke:#E91E63;stroke-width:1.8;stroke-linecap:round}
.ico-internal{fill:none;stroke:#27AE60;stroke-width:1.8;stroke-linecap:round}
.ico-surgery{fill:none;stroke:#C0392B;stroke-width:1.8;stroke-linecap:round}
.ico-urology{fill:none;stroke:#2471A3;stroke-width:1.8;stroke-linecap:round}
.ico-ear{fill:none;stroke:#7D3C98;stroke-width:1.8;stroke-linecap:round}
.ico-psych{fill:none;stroke:#5DADE2;stroke-width:1.8;stroke-linecap:round}
.ico-diabetes{fill:none;stroke:#E67E22;stroke-width:1.8;stroke-linecap:round}
.ico-default{fill:none;stroke:var(--p);stroke-width:1.8;stroke-linecap:round}

/* عند hover تصير كلها بيضاء */
.sp-card:hover .sp-ico svg *,
.sp-card.on .sp-ico svg *{stroke:#fff!important;fill:none!important}

.sp-docs-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-top:16px}
.sd-card{background:var(--card);border:1.5px solid var(--bdr);border-radius:var(--r22);overflow:hidden;transition:.25s}
.sd-card:hover{box-shadow:var(--s2);border-color:var(--p);transform:translateY(-3px)}
.sd-cov{height:80px;background:linear-gradient(120deg,var(--pll),#d9f0e0);position:relative}
.sd-pat{position:absolute;inset:0;opacity:.1;background-image:radial-gradient(circle,var(--p) 1px,transparent 1px);background-size:14px 14px}
.sd-av{width:58px;height:58px;border-radius:50%;border:4px solid var(--card);background:linear-gradient(135deg,var(--p),var(--pd));color:#fff;display:flex;align-items:center;justify-content:center;font-size:18px;font-weight:800;position:absolute;bottom:-29px;right:16px;box-shadow:var(--s1)}
.sd-body{padding:36px 14px 14px}
.sd-body h3{font-size:14px;color:var(--td);font-weight:800;margin-bottom:3px}
.sd-clin{font-size:11px;color:var(--tm);margin-bottom:7px}
.sd-clin b{color:var(--p);display:block;margin-top:1px}
.sd-foot{display:flex;align-items:center;justify-content:space-between;padding-top:9px;border-top:1.5px dashed var(--bds)}
.stars{color:#f0a93a;font-size:11.5px}
.dspec{color:var(--p);font-weight:700;font-size:11px;display:inline-block;background:var(--pl);padding:3px 10px;border-radius:var(--rF)}
.loading-state{text-align:center;padding:40px;color:var(--tm)}
</style>
@endsection

@section('content')
<div class="pg-hd">
  <div class="si">
    <div class="bc"><span>الرئيسية</span><span>/</span><span class="cur">التخصصات</span></div>
    <h1>التخصصات الطبية</h1>
    <p>اختر التخصص لتصفّح الأطباء المتاحين</p>
  </div>
</div>

<div class="sec" style="padding-top:32px">
  <div class="si">
    <div class="sp-grid2" id="spec-grid">
      <div class="loading-state" style="grid-column:1/-1">جاري تحميل التخصصات...</div>
    </div>
    <div style="padding-top:28px;border-top:1.5px solid var(--bds)">
      <h3 style="font-size:20px;font-weight:800;color:var(--td);margin-bottom:4px">أطباء تخصص <span id="spec-name" style="color:var(--p)">...</span></h3>
      <p style="font-size:13px;color:var(--tm);margin-bottom:16px">الأطباء المتاحون في هذا التخصص</p>
      <div class="sp-docs-grid" id="spec-doctors">
        <div class="loading-state" style="grid-column:1/-1">اختر تخصصاً</div>
      </div>
    </div>
  </div>
</div>
<div style="height:40px"></div>
@endsection

@section('scripts')
<script>
let allDoctors = [];

/* ══ SVG لكل تخصص حسب اسمه ══ */
function getSpecSVG(nameAr) {
  const n = nameAr || '';

  /* قلب وأوعية */
  if (/قلب|قلبي|cardiov/i.test(n)) return `<svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path class="ico-heart" d="M16 27S4 19 4 11C4 7.5 6.5 5 9.5 5c2 0 4 1.2 5.5 3C16.5 6.2 18.5 5 20.5 5 23.5 5 26 7.5 26 11c0 8-10 16-10 16z"/>
    <polyline class="ico-heart" points="2,16 6,16 9,11 12,21 15,14 17,18 20,16 30,16"/>
  </svg>`;

  /* عظام وعمود فقري */
  if (/عظ|كسور|مفاص|عمود|ortho/i.test(n)) return `<svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path class="ico-bone" d="M10 6c0-2.2 1.8-4 4-4s4 1.8 4 4-1.8 2-1.8 2l-4.4 12.5"/>
    <path class="ico-bone" d="M12.2 20.5L7.8 7c0 0-2-2-2-4s1.8-4 4-4 4 1.8 4 4"/>
    <path class="ico-bone" d="M22 26c0 2.2-1.8 4-4 4s-4-1.8-4-4 1.8-2 1.8-2l4.4-12.5"/>
    <path class="ico-bone" d="M19.8 11.5L24.2 25c0 0 2 2 2 4s-1.8 4-4 4-4-1.8-4-4"/>
  </svg>`;

  /* مخ وأعصاب */
  if (/مخ|أعصاب|عصب|neuro|دماغ/i.test(n)) return `<svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path class="ico-brain" d="M16 4C10 4 6 8 6 13c0 2.5 1 4.5 2.5 6L8 24h16l-.5-5C25 17.5 26 15.5 26 13c0-5-4-9-10-9z"/>
    <line class="ico-brain" x1="16" y1="4" x2="16" y2="24"/>
    <path class="ico-brain" d="M10 10c1.5 1 3 1 4 2.5"/>
    <path class="ico-brain" d="M22 10c-1.5 1-3 1-4 2.5"/>
    <path class="ico-brain" d="M9 16c1.5.5 3 .5 4.5 0"/>
    <path class="ico-brain" d="M23 16c-1.5.5-3 .5-4.5 0"/>
    <rect class="ico-brain" x="12" y="24" width="8" height="4" rx="2"/>
  </svg>`;

  /* أسنان */
  if (/أسنان|سنان|سن|dental|tooth/i.test(n)) return `<svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path class="ico-tooth" d="M8 4c-3 0-5 2.5-5 5 0 4 2 6 3 9 .5 1.5 1 4 2 5 .5 1 1.5 1 2 0 .5-1 1-4 2-5 .5-.8 1.5-.8 2 0 1 1 1.5 4 2 5 .5 1 1.5 1 2 0 1-1 1.5-3.5 2-5 1-3 3-5 3-9 0-2.5-2-5-5-5-1.5 0-3 .8-4 2-1-1.2-2.5-2-4-2z"/>
    <line class="ico-tooth" x1="12" y1="7" x2="12" y2="12"/>
    <line class="ico-tooth" x1="9" y1="9.5" x2="15" y2="9.5"/>
  </svg>`;

  /* عيون */
  if (/عيون|عين|بصر|ophthal|نظر/i.test(n)) return `<svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path class="ico-eye" d="M2 16S7 7 16 7s14 9 14 9-5 9-14 9S2 16 2 16z"/>
    <circle class="ico-eye" cx="16" cy="16" r="4"/>
    <circle class="ico-eye" cx="17.5" cy="14.5" r="1.5" style="fill:#1ABC9C;stroke:none"/>
    <line class="ico-eye" x1="16" y1="4" x2="16" y2="7"/>
    <line class="ico-eye" x1="16" y1="25" x2="16" y2="28"/>
    <line class="ico-eye" x1="6" y1="8" x2="8" y2="10"/>
    <line class="ico-eye" x1="26" y1="8" x2="24" y2="10"/>
  </svg>`;

  /* جلدية */
  if (/جلد|جلدي|derma|بشرة/i.test(n)) return `<svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
    <rect class="ico-skin" x="4" y="4" width="24" height="24" rx="8"/>
    <circle class="ico-skin" cx="11" cy="11" r="2"/>
    <circle class="ico-skin" cx="21" cy="11" r="2"/>
    <circle class="ico-skin" cx="11" cy="21" r="2"/>
    <circle class="ico-skin" cx="21" cy="21" r="2"/>
    <circle class="ico-skin" cx="16" cy="16" r="2.5"/>
    <path class="ico-skin" d="M13 8C14 6 16 5.5 17 6"/>
    <path class="ico-skin" d="M8 13C6 14 5.5 16 6 17"/>
  </svg>`;

  /* رئة وصدر */
  if (/رئ|صدر|تنفس|pulm|chest/i.test(n)) return `<svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path class="ico-lungs" d="M16 4v10"/>
    <path class="ico-lungs" d="M16 14C14 14 8 13 6 16c-2 3-2 7 0 9 1.5 1.5 4 2 6 1l4-2"/>
    <path class="ico-lungs" d="M16 14c2 0 8-1 10 2 2 3 2 7 0 9-1.5 1.5-4 2-6 1l-4-2"/>
    <ellipse class="ico-lungs" cx="9" cy="21" rx="3" ry="4"/>
    <ellipse class="ico-lungs" cx="23" cy="21" rx="3" ry="4"/>
  </svg>`;

  /* أطفال */
  if (/أطفال|طفل|pediatr|نيوناتال/i.test(n)) return `<svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
    <circle class="ico-baby" cx="16" cy="10" r="6"/>
    <path class="ico-baby" d="M13 9.5C13.5 9 14.5 9 15 9.5"/>
    <path class="ico-baby" d="M17 9.5C17.5 9 18.5 9 19 9.5"/>
    <path class="ico-baby" d="M13.5 12C14.3 13 17.7 13 18.5 12"/>
    <path class="ico-baby" d="M10 24c0-3.3 2.7-6 6-6s6 2.7 6 6"/>
    <line class="ico-baby" x1="6" y1="20" x2="10" y2="22"/>
    <line class="ico-baby" x1="26" y1="20" x2="22" y2="22"/>
    <path class="ico-baby" d="M6 20c-1-1-1-3 0-4"/>
    <path class="ico-baby" d="M26 20c1-1 1-3 0-4"/>
  </svg>`;

  /* باطنة */
  if (/باطن|داخل|internal|عام/i.test(n)) return `<svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
    <circle class="ico-internal" cx="16" cy="16" r="12"/>
    <path class="ico-internal" d="M16 8v4"/>
    <path class="ico-internal" d="M16 12c-2.5 0-4 1.5-4 3.5 0 3 4 4 4 7"/>
    <circle class="ico-internal" cx="16" cy="23" r="1" style="fill:#27AE60;stroke:none"/>
    <line class="ico-internal" x1="22" y1="10" x2="24" y2="8"/>
    <line class="ico-internal" x1="10" y1="10" x2="8" y2="8"/>
    <line class="ico-internal" x1="24" y1="16" x2="27" y2="16"/>
    <line class="ico-internal" x1="5" y1="16" x2="8" y2="16"/>
  </svg>`;

  /* جراحة */
  if (/جراح|surgery|عمليات/i.test(n)) return `<svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path class="ico-surgery" d="M8 8l16 16"/>
    <path class="ico-surgery" d="M24 8L8 24"/>
    <circle class="ico-surgery" cx="8" cy="8" r="3"/>
    <circle class="ico-surgery" cx="24" cy="8" r="3"/>
    <path class="ico-surgery" d="M12 22l2-2 2 2 2-2 2 2"/>
    <rect class="ico-surgery" x="6" y="24" width="20" height="4" rx="2"/>
    <line class="ico-surgery" x1="16" y1="4" x2="16" y2="7"/>
    <line class="ico-surgery" x1="16" y1="25" x2="16" y2="28"/>
  </svg>`;

  /* مسالك بولية */
  if (/بول|كلى|مسالك|nephro|uro/i.test(n)) return `<svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path class="ico-urology" d="M10 6C7 6 5 9 5 12c0 4 2 6 5 8l2 6h8l2-6c3-2 5-4 5-8 0-3-2-6-5-6-2 0-3.5 1-4 2.5C17.5 7 16 6 10 6z"/>
    <path class="ico-urology" d="M13 26v3M19 26v3"/>
    <line class="ico-urology" x1="16" y1="12" x2="16" y2="20"/>
    <path class="ico-urology" d="M13 14c1 2 6 2 6 0"/>
  </svg>`;

  /* أنف وأذن وحنجرة */
  if (/أذن|أنف|حنجرة|ENT|耳|سمع/i.test(n)) return `<svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path class="ico-ear" d="M20 6C14 6 10 10 10 15c0 3 1.5 5.5 4 7l1 5h6l1-4c2-1 4-3 4-6 0-4-3-8-6-11z"/>
    <path class="ico-ear" d="M14 15c0-3 2-5 5-5"/>
    <path class="ico-ear" d="M16 18c0-1.5 1.5-3 3-3"/>
    <circle class="ico-ear" cx="19" cy="18" r="1.5" style="fill:#7D3C98;stroke:none"/>
    <path class="ico-ear" d="M10 12C8 10 6 10 5 12s0 5 2 6"/>
  </svg>`;

  /* نفسية */
  if (/نفس|عقل|psych|ذهن/i.test(n)) return `<svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path class="ico-psych" d="M16 4C10 4 6 8 6 13c0 2.5 1 4.5 2.5 6l-.5 5h16l-.5-5C25 17.5 26 15.5 26 13c0-5-4-9-10-9z"/>
    <path class="ico-psych" d="M12 13c1-2 2-3 4-3s3 1 4 3"/>
    <line class="ico-psych" x1="16" y1="10" x2="16" y2="13"/>
    <path class="ico-psych" d="M12 18c1.5 2 6.5 2 8 0"/>
    <line class="ico-psych" x1="10" y1="13" x2="8" y2="11"/>
    <line class="ico-psych" x1="22" y1="13" x2="24" y2="11"/>
  </svg>`;

  /* سكري وغدد */
  if (/سكر|غدد|endoc|هرمون/i.test(n)) return `<svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
    <circle class="ico-diabetes" cx="16" cy="16" r="6"/>
    <path class="ico-diabetes" d="M16 4v4M16 24v4M4 16h4M24 16h4"/>
    <path class="ico-diabetes" d="M7.5 7.5l2.8 2.8M21.7 21.7l2.8 2.8M21.7 10.3l2.8-2.8M7.5 24.5l2.8-2.8"/>
    <line class="ico-diabetes" x1="13" y1="16" x2="19" y2="16"/>
    <line class="ico-diabetes" x1="16" y1="13" x2="16" y2="19"/>
  </svg>`;

  /* افتراضي — نبض */
  return `<svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path class="ico-default" d="M2 16h5l3-9 4 18 4-12 3 6 3-3h6"/>
    <circle class="ico-default" cx="26" cy="16" r="1.5" style="fill:var(--p);stroke:none"/>
  </svg>`;
}

async function loadData() {
  try {
    const [specRes, docRes] = await Promise.all([
      fetch(API + '/specialties', { headers: { 'Accept': 'application/json' } }),
      fetch(API + '/doctors', { headers: { 'Accept': 'application/json', 'Authorization': 'Bearer ' + token } })
    ]);
    const specs = await specRes.json();
    allDoctors = await docRes.json();

    let html = '';
    specs.forEach(function(s) {
      const count = allDoctors.filter(function(d) { return d.specialty_id == s.id; }).length;
      const icon = getSpecSVG(s.name_ar);
      html += '<div class="sp-card" onclick="selectSpec(' + s.id + ',\'' + s.name_ar.replace(/'/g,"&#39;") + '\',this)">';
      html += '<div class="sp-ico">' + icon + '</div>';
      html += '<h4>' + s.name_ar + '</h4><span>' + count + ' طبيب</span></div>';
    });
    document.getElementById('spec-grid').innerHTML = html || '<div class="loading-state">لا توجد تخصصات</div>';

    if (specs.length) {
      const firstCard = document.querySelector('.sp-card');
      if (firstCard) selectSpec(specs[0].id, specs[0].name_ar, firstCard);
    }
  } catch(e) {
    document.getElementById('spec-grid').innerHTML = '<div class="loading-state">تعذّر تحميل البيانات</div>';
  }
}

function selectSpec(specId, specName, card) {
  document.querySelectorAll('.sp-card').forEach(function(c){ c.classList.remove('on'); });
  card.classList.add('on');
  document.getElementById('spec-name').textContent = specName;

  const doctors = allDoctors.filter(function(d) { return d.specialty_id == specId; });
  if (!doctors.length) {
    document.getElementById('spec-doctors').innerHTML = '<div class="loading-state" style="grid-column:1/-1">لا يوجد أطباء في هذا التخصص حالياً</div>';
    return;
  }

  let html = '';
  doctors.forEach(function(d) {
    const initial = d.user && d.user.name ? d.user.name.charAt(0) : 'د';
    const name = d.user && d.user.name ? d.user.name : 'طبيب';
    const clinics = d.clinics && d.clinics.length ? d.clinics.map(function(c){ return c.name; }).join('، ') : '—';
    const exp = d.years_experience ? d.years_experience + ' سنوات خبرة' : '';
    html += '<div class="sd-card"><div class="sd-cov"><div class="sd-pat"></div><div class="sd-av">' + initial + '</div></div>';
    html += '<div class="sd-body"><div class="stars" style="margin-bottom:5px">★★★★★</div><h3>' + name + '</h3>';
    html += '<div class="sd-clin">العيادة<b>' + clinics + '</b></div><div style="font-size:11px;color:var(--tm);margin-bottom:8px">' + exp + '</div>';
    html += '<div class="sd-foot"><span class="dspec">' + specName + '</span><a href="/booking" class="btn bp bsm">احجز</a></div></div></div>';
  });
  document.getElementById('spec-doctors').innerHTML = html;
}

loadData();
</script>
@endsection
