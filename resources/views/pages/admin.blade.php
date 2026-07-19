@extends('layouts.app')

@section('title', 'لوحة التحكم — منصة الزنتان الطبية')

@section('styles')
<style>
.adm{max-width:1100px;margin:0 auto;padding:28px 20px 60px}

/* Stats */
.stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-bottom:28px}
.stat-card{background:var(--card);border:1.5px solid var(--bdr);border-radius:var(--r22);padding:20px;display:flex;align-items:center;gap:14px;transition:.25s}
.stat-card:hover{box-shadow:var(--s2);border-color:var(--p)}
.stat-ico{width:48px;height:48px;border-radius:14px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.stat-ico svg{width:24px;height:24px;fill:none;stroke:#fff;stroke-width:2;stroke-linecap:round}
.stat-val{font-size:26px;font-weight:900;color:var(--td);line-height:1}
.stat-lbl{font-size:12px;color:var(--tm);font-weight:600;margin-top:3px}

/* Tabs */
.adm-tabs{display:flex;gap:6px;margin-bottom:24px;flex-wrap:wrap}
.adm-tab{padding:9px 20px;border-radius:var(--rF);font-weight:700;font-size:13px;color:var(--tm);border:1.5px solid var(--bdr);background:var(--card);cursor:pointer;transition:.2s;font-family:var(--font)}
.adm-tab.on{background:var(--p);color:#fff;border-color:var(--p)}
.adm-tab:hover:not(.on){border-color:var(--p);color:var(--p)}

/* Sections */
.adm-sec{display:none}
.adm-sec.on{display:block}

/* Table */
.adm-table{width:100%;border-collapse:collapse;background:var(--card);border-radius:var(--r22);overflow:hidden;border:1.5px solid var(--bdr)}
.adm-table th{background:var(--pl);color:var(--p);font-size:12.5px;font-weight:800;padding:12px 16px;text-align:right}
.adm-table td{padding:12px 16px;font-size:13px;color:var(--td);border-top:1px solid var(--bds)}
.adm-table tr:hover td{background:var(--pll)}
.badge{display:inline-flex;padding:3px 10px;border-radius:var(--rF);font-size:11px;font-weight:700}
.b-ok{background:#e8f8ee;color:#22a55e}
.b-pn{background:#fff8ec;color:#f0a93a}
.b-cn{background:#fde8e8;color:#e14b4b}
.b-dn{background:var(--bg);color:var(--tm)}

/* Form card */
.form-card{background:var(--card);border:1.5px solid var(--bdr);border-radius:var(--r22);padding:24px;margin-bottom:20px}
.form-card h3{font-size:16px;font-weight:800;color:var(--td);margin-bottom:20px;display:flex;align-items:center;gap:8px}
.form-card h3 svg{width:18px;height:18px;fill:none;stroke:var(--p);stroke-width:2;stroke-linecap:round}
.fg{margin-bottom:16px}
.fg label{display:block;font-size:12.5px;font-weight:700;color:var(--td);margin-bottom:6px}
.fg input,.fg select,.fg textarea{width:100%;padding:11px 14px;border:1.5px solid var(--bdr);border-radius:var(--r8);font-size:14px;color:var(--td);background:var(--bg);font-family:var(--font);transition:.2s}
.fg input:focus,.fg select:focus,.fg textarea:focus{outline:none;border-color:var(--p);background:var(--card)}
.form-grid{display:grid;grid-template-columns:1fr 1fr;gap:14px}
.sbtn{padding:11px 24px;background:var(--p);color:#fff;border:none;border-radius:var(--r8);font-size:14px;font-weight:800;cursor:pointer;font-family:var(--font);transition:.25s}
.sbtn:hover{background:var(--pd);transform:translateY(-1px)}
.dbtn{padding:7px 14px;background:#fde8e8;color:#e14b4b;border:1px solid #fbb;border-radius:var(--r8);font-size:12px;font-weight:700;cursor:pointer;font-family:var(--font);transition:.2s}
.dbtn:hover{background:#e14b4b;color:#fff}
.ebtn{padding:7px 14px;background:var(--pl);color:var(--p);border:1px solid var(--bdr);border-radius:var(--r8);font-size:12px;font-weight:700;cursor:pointer;font-family:var(--font);transition:.2s}
.ebtn:hover{background:var(--p);color:#fff}

/* Toast */
.toast{position:fixed;bottom:24px;left:24px;background:#22a55e;color:#fff;padding:12px 20px;border-radius:var(--r8);font-size:14px;font-weight:700;z-index:999;opacity:0;transform:translateY(10px);transition:.3s;pointer-events:none}
.toast.show{opacity:1;transform:translateY(0)}
.toast.err{background:#e14b4b}

.sec-hd{display:flex;align-items:center;justify-content:space-between;margin-bottom:16px}
.sec-hd h2{font-size:18px;font-weight:800;color:var(--td)}
.loading-state{text-align:center;padding:40px;color:var(--tm)}

@media(max-width:768px){
  .stats-grid{grid-template-columns:1fr 1fr!important}
  .form-grid{grid-template-columns:1fr!important}
  .adm-table{font-size:12px}
  .adm-table th,.adm-table td{padding:8px 10px}
}
</style>
@endsection

@section('content')
<div class="pg-hd">
  <div class="si">
    <div class="bc"><span>الرئيسية</span><span>/</span><span class="cur">لوحة التحكم</span></div>
    <h1>لوحة التحكم</h1>
    <p>إدارة الأطباء والعيادات والتخصصات والحجوزات</p>
  </div>
</div>

<div class="adm">

  <!-- الإحصائيات -->
  <div class="stats-grid">
    <div class="stat-card">
      <div class="stat-ico" style="background:linear-gradient(135deg,var(--p),var(--pd))">
        <svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
      </div>
      <div><div class="stat-val" id="s-docs">—</div><div class="stat-lbl">طبيب مسجّل</div></div>
    </div>
    <div class="stat-card">
      <div class="stat-ico" style="background:linear-gradient(135deg,#f0a93a,#d4891a)">
        <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
      </div>
      <div><div class="stat-val" id="s-apts">—</div><div class="stat-lbl">حجز إجمالي</div></div>
    </div>
    <div class="stat-card">
      <div class="stat-ico" style="background:linear-gradient(135deg,#5b9bd5,#2e6da4)">
        <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
      </div>
      <div><div class="stat-val" id="s-clinics">—</div><div class="stat-lbl">عيادة</div></div>
    </div>
    <div class="stat-card">
      <div class="stat-ico" style="background:linear-gradient(135deg,#e14b4b,#c0392b)">
        <svg viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
      </div>
      <div><div class="stat-val" id="s-specs">—</div><div class="stat-lbl">تخصص طبي</div></div>
    </div>
  </div>

  <!-- التبويبات -->
  <div class="adm-tabs">
    <button class="adm-tab on" onclick="switchTab('apts',this)">الحجوزات</button>
    <button class="adm-tab" onclick="switchTab('doctors',this)">الأطباء</button>
    <button class="adm-tab" onclick="switchTab('specs',this)">التخصصات</button>
    <button class="adm-tab" onclick="switchTab('clinics',this)">العيادات</button>
  </div>

  <!-- ══ الحجوزات ══ -->
  <div class="adm-sec on" id="sec-apts">
    <div class="sec-hd"><h2>الحجوزات</h2></div>
    <div id="apts-wrap"><div class="loading-state">جاري التحميل...</div></div>
  </div>

  <!-- ══ الأطباء ══ -->
  <div class="adm-sec" id="sec-doctors">
    <div class="form-card">
      <h3><svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>إضافة طبيب جديد</h3>
      <div class="form-grid">
        <div class="fg"><label>الاسم الكامل *</label><input type="text" id="d-name" placeholder="د. محمد علي"></div>
        <div class="fg"><label>البريد الإلكتروني *</label><input type="email" id="d-email" placeholder="doctor@email.com"></div>
        <div class="fg"><label>كلمة المرور *</label><input type="password" id="d-pass" placeholder="كلمة مرور قوية"></div>
        <div class="fg"><label>رقم الهاتف</label><input type="text" id="d-phone" placeholder="091-XXX-XXXX"></div>
        <div class="fg"><label>التخصص *</label><select id="d-spec"><option value="">اختر التخصص</option></select></div>
        <div class="fg"><label>سنوات الخبرة</label><input type="number" id="d-exp" placeholder="5" min="0" max="50"></div>
      </div>
      <div class="fg"><label>نبذة عن الطبيب</label><textarea id="d-bio" rows="2" placeholder="نبذة مختصرة..."></textarea></div>
      <button class="sbtn" onclick="addDoctor()">إضافة الطبيب</button>
    </div>
    <div class="sec-hd"><h2>قائمة الأطباء</h2></div>
    <div id="docs-wrap"><div class="loading-state">جاري التحميل...</div></div>
  </div>

  <!-- ══ التخصصات ══ -->
  <div class="adm-sec" id="sec-specs">
    <div class="form-card">
      <h3><svg viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>إضافة تخصص</h3>
      <div class="form-grid">
        <div class="fg"><label>اسم التخصص بالعربية *</label><input type="text" id="sp-ar" placeholder="باطنة، أسنان..."></div>
        <div class="fg"><label>اسم التخصص بالإنجليزية</label><input type="text" id="sp-en" placeholder="Internal Medicine..."></div>
      </div>
      <button class="sbtn" onclick="addSpec()">إضافة التخصص</button>
    </div>
    <div class="sec-hd"><h2>التخصصات</h2></div>
    <div id="specs-wrap"><div class="loading-state">جاري التحميل...</div></div>
  </div>

  <!-- ══ العيادات ══ -->
  <div class="adm-sec" id="sec-clinics">
    <div class="form-card">
      <h3><svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>إضافة عيادة</h3>
      <div class="form-grid">
        <div class="fg"><label>اسم العيادة *</label><input type="text" id="cl-name" placeholder="عيادة الزنتان المركزية"></div>
        <div class="fg"><label>رقم الهاتف</label><input type="text" id="cl-phone" placeholder="091-XXX-XXXX"></div>
      </div>
      <div class="fg"><label>العنوان *</label><input type="text" id="cl-addr" placeholder="شارع الجمهورية، الزنتان"></div>
      <button class="sbtn" onclick="addClinic()">إضافة العيادة</button>
    </div>
    <div class="sec-hd"><h2>العيادات</h2></div>
    <div id="clinics-wrap"><div class="loading-state">جاري التحميل...</div></div>
  </div>

</div>

<div class="toast" id="toast"></div>
@endsection

@section('scripts')
<script>
const H = { 'Accept':'application/json', 'Authorization':'Bearer '+token, 'Content-Type':'application/json' };
const statusMap = { confirmed:{l:'مؤكد',c:'b-ok'}, pending:{l:'قيد الانتظار',c:'b-pn'}, cancelled:{l:'ملغي',c:'b-cn'}, completed:{l:'مكتمل',c:'b-dn'} };
const months = ['يناير','فبراير','مارس','أبريل','مايو','يونيو','يوليو','أغسطس','سبتمبر','أكتوبر','نوفمبر','ديسمبر'];

let allDocs=[], allSpecs=[], allClinics=[], allApts=[];

function toast(msg, err=false){
  const t=document.getElementById('toast');
  t.textContent=msg; t.className='toast'+(err?' err':'');
  t.classList.add('show');
  setTimeout(()=>t.classList.remove('show'),3000);
}

function switchTab(name, btn){
  document.querySelectorAll('.adm-tab').forEach(b=>b.classList.remove('on'));
  document.querySelectorAll('.adm-sec').forEach(s=>s.classList.remove('on'));
  btn.classList.add('on');
  document.getElementById('sec-'+name).classList.add('on');
}

/* ══ LOAD ALL ══ */
async function loadAll(){
  try {
    const [ar,sr,cr,apr] = await Promise.all([
      fetch(API+'/doctors',{headers:H}),
      fetch(API+'/specialties',{headers:H}),
      fetch(API+'/clinics',{headers:H}),
      fetch(API+'/my-appointments',{headers:H}),
    ]);
    allDocs = await ar.json();
    allSpecs = await sr.json();
    allClinics = await cr.json();
    allApts = await apr.json();

    document.getElementById('s-docs').textContent = Array.isArray(allDocs)?allDocs.length:'—';
    document.getElementById('s-specs').textContent = Array.isArray(allSpecs)?allSpecs.length:'—';
    document.getElementById('s-clinics').textContent = Array.isArray(allClinics)?allClinics.length:'—';
    document.getElementById('s-apts').textContent = Array.isArray(allApts)?allApts.length:'—';

    renderApts(); renderDocs(); renderSpecs(); renderClinics(); fillSpecSelect();
  } catch(e){ toast('تعذر تحميل البيانات',true); }
}

/* ══ APPOINTMENTS ══ */
function renderApts(){
  if(!Array.isArray(allApts)||!allApts.length){
    document.getElementById('apts-wrap').innerHTML='<div class="loading-state">لا توجد حجوزات</div>';return;
  }
  let h='<table class="adm-table"><thead><tr><th>#</th><th>المريض</th><th>الطبيب</th><th>التاريخ</th><th>الوقت</th><th>العيادة</th><th>الحالة</th><th>إجراءات</th></tr></thead><tbody>';
  allApts.forEach(function(a){
    const d=new Date(a.appointment_date);
    const dateStr=d.getDate()+' '+months[d.getMonth()]+' '+d.getFullYear();
    const doc=a.doctor_profile&&a.doctor_profile.user?a.doctor_profile.user.name:'—';
    const clinic=a.clinic?a.clinic.name:'—';
    const st=statusMap[a.status]||{l:a.status,c:'b-dn'};
    const user=a.user?a.user.name:'—';
    h+='<tr><td>'+a.id+'</td><td>'+user+'</td><td>'+doc+'</td><td>'+dateStr+'</td><td>'+(a.appointment_time||'—')+'</td><td>'+clinic+'</td>';
    h+='<td><span class="badge '+st.c+'">'+st.l+'</span></td>';
    h+='<td style="display:flex;gap:6px">';
    if(a.status==='pending') h+='<button class="ebtn" onclick="confirmApt('+a.id+')">تأكيد</button>';
    if(a.status!=='cancelled'&&a.status!=='completed') h+='<button class="dbtn" onclick="cancelApt('+a.id+')">إلغاء</button>';
    h+='</td></tr>';
  });
  h+='</tbody></table>';
  document.getElementById('apts-wrap').innerHTML=h;
}

async function confirmApt(id){
  try {
    const r=await fetch(API+'/appointments/'+id+'/confirm',{method:'POST',headers:H});
    if(r.ok){ toast('تم تأكيد الموعد ✓'); loadAll(); }
    else toast('تعذر التأكيد',true);
  } catch(e){ toast('خطأ في الاتصال',true); }
}

async function cancelApt(id){
  if(!confirm('هل تريد إلغاء هذا الموعد؟')) return;
  try {
    const r=await fetch(API+'/appointments/'+id+'/cancel',{method:'POST',headers:H});
    if(r.ok){ toast('تم الإلغاء'); loadAll(); }
    else toast('تعذر الإلغاء',true);
  } catch(e){ toast('خطأ في الاتصال',true); }
}

/* ══ DOCTORS ══ */
function renderDocs(){
  if(!Array.isArray(allDocs)||!allDocs.length){
    document.getElementById('docs-wrap').innerHTML='<div class="loading-state">لا يوجد أطباء</div>';return;
  }
  let h='<table class="adm-table"><thead><tr><th>#</th><th>الاسم</th><th>التخصص</th><th>الخبرة</th><th>العيادات</th><th>إجراءات</th></tr></thead><tbody>';
  allDocs.forEach(function(d){
    const name=d.user?d.user.name:'—';
    const spec=d.specialty?d.specialty.name_ar:'—';
    const exp=d.years_experience?d.years_experience+' سنوات':'—';
    const cls=d.clinics&&d.clinics.length?d.clinics.map(function(c){return c.name}).join('، '):'—';
    h+='<tr><td>'+d.id+'</td><td><b>'+name+'</b></td><td><span class="badge b-ok">'+spec+'</span></td><td>'+exp+'</td><td>'+cls+'</td>';
    h+='<td><button class="dbtn" onclick="deleteDoctor('+d.id+')">حذف</button></td></tr>';
  });
  h+='</tbody></table>';
  document.getElementById('docs-wrap').innerHTML=h;
}

function fillSpecSelect(){
  const sel=document.getElementById('d-spec');
  sel.innerHTML='<option value="">اختر التخصص</option>';
  if(Array.isArray(allSpecs)) allSpecs.forEach(function(s){
    sel.innerHTML+='<option value="'+s.id+'">'+s.name_ar+'</option>';
  });
}

async function addDoctor(){
  const name=document.getElementById('d-name').value.trim();
  const email=document.getElementById('d-email').value.trim();
  const pass=document.getElementById('d-pass').value.trim();
  const phone=document.getElementById('d-phone').value.trim();
  const spec=document.getElementById('d-spec').value;
  const exp=document.getElementById('d-exp').value;
  const bio=document.getElementById('d-bio').value.trim();
  if(!name||!email||!pass||!spec){toast('يرجى تعبئة الحقول المطلوبة',true);return;}
  try {
    const r=await fetch(API+'/register',{method:'POST',headers:H,body:JSON.stringify({name,email,password:pass,password_confirmation:pass,phone,role:'doctor'})});
    const u=await r.json();
    if(!r.ok){toast(u.message||'خطأ في إنشاء الحساب',true);return;}
    const r2=await fetch(API+'/doctors',{method:'POST',headers:{...H,'Authorization':'Bearer '+u.token},body:JSON.stringify({specialty_id:spec,years_experience:exp||0,bio})});
    if(r2.ok){
      toast('تم إضافة الطبيب ✓');
      ['d-name','d-email','d-pass','d-phone','d-exp','d-bio'].forEach(function(id){document.getElementById(id).value='';});
      document.getElementById('d-spec').value='';
      loadAll();
    } else { toast('تم إنشاء الحساب لكن تعذر إنشاء الملف الطبي',true); }
  } catch(e){ toast('خطأ في الاتصال',true); }
}

async function deleteDoctor(id){
  if(!confirm('هل تريد حذف هذا الطبيب نهائياً؟')) return;
  try {
    const r=await fetch(API+'/doctors/'+id,{method:'DELETE',headers:H});
    if(r.ok){ toast('تم الحذف'); loadAll(); }
    else toast('تعذر الحذف',true);
  } catch(e){ toast('خطأ في الاتصال',true); }
}

/* ══ SPECIALTIES ══ */
function renderSpecs(){
  if(!Array.isArray(allSpecs)||!allSpecs.length){
    document.getElementById('specs-wrap').innerHTML='<div class="loading-state">لا توجد تخصصات</div>';return;
  }
  let h='<table class="adm-table"><thead><tr><th>#</th><th>التخصص بالعربية</th><th>التخصص بالإنجليزية</th><th>عدد الأطباء</th><th>إجراءات</th></tr></thead><tbody>';
  allSpecs.forEach(function(s){
    const cnt=Array.isArray(allDocs)?allDocs.filter(function(d){return d.specialty_id==s.id}).length:0;
    h+='<tr><td>'+s.id+'</td><td><b>'+s.name_ar+'</b></td><td>'+(s.name_en||'—')+'</td><td><span class="badge b-ok">'+cnt+' طبيب</span></td>';
    h+='<td><button class="dbtn" onclick="deleteSpec('+s.id+')">حذف</button></td></tr>';
  });
  h+='</tbody></table>';
  document.getElementById('specs-wrap').innerHTML=h;
}

async function addSpec(){
  const ar=document.getElementById('sp-ar').value.trim();
  const en=document.getElementById('sp-en').value.trim();
  if(!ar){toast('يرجى إدخال اسم التخصص',true);return;}
  try {
    const r=await fetch(API+'/specialties',{method:'POST',headers:H,body:JSON.stringify({name_ar:ar,name_en:en})});
    if(r.ok){ toast('تم إضافة التخصص ✓'); document.getElementById('sp-ar').value=''; document.getElementById('sp-en').value=''; loadAll(); }
    else toast('تعذر الإضافة',true);
  } catch(e){ toast('خطأ في الاتصال',true); }
}

async function deleteSpec(id){
  if(!confirm('هل تريد حذف هذا التخصص؟')) return;
  try {
    const r=await fetch(API+'/specialties/'+id,{method:'DELETE',headers:H});
    if(r.ok){ toast('تم الحذف'); loadAll(); }
    else toast('تعذر الحذف',true);
  } catch(e){ toast('خطأ في الاتصال',true); }
}

/* ══ CLINICS ══ */
function renderClinics(){
  if(!Array.isArray(allClinics)||!allClinics.length){
    document.getElementById('clinics-wrap').innerHTML='<div class="loading-state">لا توجد عيادات</div>';return;
  }
  let h='<table class="adm-table"><thead><tr><th>#</th><th>اسم العيادة</th><th>العنوان</th><th>الهاتف</th><th>إجراءات</th></tr></thead><tbody>';
  allClinics.forEach(function(c){
    h+='<tr><td>'+c.id+'</td><td><b>'+c.name+'</b></td><td>'+(c.address||'—')+'</td><td>'+(c.phone||'—')+'</td>';
    h+='<td><button class="dbtn" onclick="deleteClinic('+c.id+')">حذف</button></td></tr>';
  });
  h+='</tbody></table>';
  document.getElementById('clinics-wrap').innerHTML=h;
}

async function addClinic(){
  const name=document.getElementById('cl-name').value.trim();
  const addr=document.getElementById('cl-addr').value.trim();
  const phone=document.getElementById('cl-phone').value.trim();
  if(!name||!addr){toast('يرجى تعبئة الحقول المطلوبة',true);return;}
  try {
    const r=await fetch(API+'/clinics',{method:'POST',headers:H,body:JSON.stringify({name,address:addr,phone})});
    if(r.ok){ toast('تم إضافة العيادة ✓'); document.getElementById('cl-name').value=''; document.getElementById('cl-addr').value=''; document.getElementById('cl-phone').value=''; loadAll(); }
    else toast('تعذر الإضافة',true);
  } catch(e){ toast('خطأ في الاتصال',true); }
}

async function deleteClinic(id){
  if(!confirm('هل تريد حذف هذه العيادة؟')) return;
  try {
    const r=await fetch(API+'/clinics/'+id,{method:'DELETE',headers:H});
    if(r.ok){ toast('تم الحذف'); loadAll(); }
    else toast('تعذر الحذف',true);
  } catch(e){ toast('خطأ في الاتصال',true); }
}

loadAll();
</script>
@endsection
