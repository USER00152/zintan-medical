@extends('layouts.app')

@section('title', 'مواعيدي — منصة الزنتان الطبية')

@section('styles')
<style>
.apt-tabs{display:flex;gap:8px;margin-bottom:24px;flex-wrap:wrap}
.apt-tab{padding:9px 20px;border-radius:var(--rF);font-weight:700;font-size:13.5px;color:var(--tm);border:1.5px solid var(--bdr);background:var(--card);cursor:pointer;transition:.2s;font-family:var(--font)}
.apt-tab.on{background:var(--p);color:#fff;border-color:var(--p)}
.apt-grid{display:flex;flex-direction:column;gap:14px}
.apt-card{background:var(--card);border:1.5px solid var(--bdr);border-radius:var(--r22);padding:20px 24px;display:flex;align-items:center;gap:18px;transition:.25s}
.apt-card:hover{box-shadow:var(--s2);border-color:var(--p)}
.apt-dt{min-width:62px;text-align:center;background:var(--pl);border-radius:var(--r14);padding:12px 8px;flex-shrink:0}
.apt-dt .ad{display:block;font-size:24px;font-weight:900;color:var(--p);line-height:1}
.apt-dt .am{display:block;font-size:10.5px;font-weight:700;color:var(--tm);margin-top:3px}
.apt-info{flex:1}
.apt-info h3{font-size:15px;color:var(--td);font-weight:800;margin-bottom:4px}
.apt-spec{font-size:12px;color:var(--p);font-weight:700;margin-bottom:7px;display:inline-block;background:var(--pl);padding:2px 10px;border-radius:var(--rF)}
.apt-meta{display:flex;gap:14px;font-size:12px;color:var(--tm);font-weight:600;flex-wrap:wrap}
.apt-acts{display:flex;flex-direction:column;gap:8px;flex-shrink:0;align-items:flex-end}
.apt-st{padding:5px 14px;border-radius:var(--rF);font-size:12px;font-weight:700}
.st-ok{background:#e8f8ee;color:#22a55e}
.st-pn{background:#fff8ec;color:#f0a93a}
.st-dn{background:var(--bg);color:var(--tm)}
.st-cn{background:#fde8e8;color:#e14b4b}
.empty-state{text-align:center;padding:60px 20px}
.empty-state h3{font-size:18px;color:var(--td);font-weight:800;margin-bottom:8px}
.empty-state p{color:var(--tm);font-size:14px;margin-bottom:20px}
.loading-state{text-align:center;padding:40px;color:var(--tm)}
</style>
@endsection

@section('content')
<div class="pg-hd">
  <div class="si"><div class="bc"><span>الرئيسية</span><span>/</span><span class="cur">مواعيدي</span></div><h1>مواعيدي الطبية</h1><p>تتبع حجوزاتك القادمة والسابقة</p></div>
</div>

<div class="si" style="padding:28px 28px 40px">
  <div class="apt-tabs">
    <button class="apt-tab on" onclick="filterApts('all',this)">الكل</button>
    <button class="apt-tab" onclick="filterApts('pending',this)">قيد الانتظار</button>
    <button class="apt-tab" onclick="filterApts('confirmed',this)">مؤكدة</button>
    <button class="apt-tab" onclick="filterApts('completed',this)">مكتملة</button>
    <button class="apt-tab" onclick="filterApts('cancelled',this)">ملغية</button>
  </div>
  <div class="apt-grid" id="apt-grid"><div class="loading-state">جاري تحميل المواعيد...</div></div>
</div>
@endsection

@section('scripts')
<script>
let allApts = [];
const months = ['يناير','فبراير','مارس','أبريل','مايو','يونيو','يوليو','أغسطس','سبتمبر','أكتوبر','نوفمبر','ديسمبر'];
const statusMap = {
    'pending': { label: 'قيد الانتظار', cls: 'st-pn' },
    'confirmed': { label: 'مؤكد', cls: 'st-ok' },
    'completed': { label: 'مكتمل', cls: 'st-dn' },
    'cancelled': { label: 'ملغي', cls: 'st-cn' },
};

async function loadAppointments() {
    try {
        const res = await fetch(API + '/my-appointments', { headers: { 'Accept': 'application/json', 'Authorization': 'Bearer ' + token } });
        allApts = await res.json();
        renderApts(allApts);
    } catch(e) {
        document.getElementById('apt-grid').innerHTML = '<div class="loading-state">تعذّر تحميل المواعيد</div>';
    }
}

function filterApts(status, btn) {
    document.querySelectorAll('.apt-tab').forEach(function(t){t.classList.remove('on')});
    btn.classList.add('on');
    const filtered = status === 'all' ? allApts : allApts.filter(function(a){return a.status === status});
    renderApts(filtered);
}

function renderApts(apts) {
    if (!apts.length) {
        document.getElementById('apt-grid').innerHTML = '<div class="empty-state"><h3>لا توجد مواعيد</h3><p>لم يتم العثور على مواعيد في هذه الفئة</p><a href="/booking" class="btn bp">احجز موعداً الآن</a></div>';
        return;
    }
    let html = '';
    apts.forEach(function(a) {
        const date = new Date(a.appointment_date);
        const day = date.getDate();
        const month = months[date.getMonth()];
        const time = a.appointment_time ? a.appointment_time.slice(0,5) : '—';
        const doctor = a.doctor_profile && a.doctor_profile.user ? a.doctor_profile.user.name : '—';
        const spec = a.doctor_profile && a.doctor_profile.specialty ? a.doctor_profile.specialty.name_ar : '—';
        const clinic = a.clinic ? a.clinic.name : '—';
        const st = statusMap[a.status] || { label: a.status, cls: 'st-dn' };

        html += '<div class="apt-card"><div class="apt-dt"><span class="ad">' + day + '</span><span class="am">' + month + '</span></div>';
        html += '<div class="apt-info"><span class="apt-spec">' + spec + '</span><h3>' + doctor + '</h3>';
        html += '<div class="apt-meta"><span>' + time + '</span><span>' + clinic + '</span></div></div>';
        html += '<div class="apt-acts"><span class="apt-st ' + st.cls + '">' + st.label + '</span>';
        if (a.status === 'pending' || a.status === 'confirmed') {
            html += '<button class="btn bo bsm" onclick="cancelApt(' + a.id + ',this)">إلغاء</button>';
        }
        html += '</div></div>';
    });
    document.getElementById('apt-grid').innerHTML = html;
}

async function cancelApt(id, btn) {
    if (!confirm('هل أنت متأكد من إلغاء هذا الموعد؟')) return;
    btn.textContent = 'جاري الإلغاء...';
    btn.disabled = true;
    try {
        const res = await fetch(API + '/appointments/' + id + '/cancel', {
            method: 'POST', headers: { 'Accept': 'application/json', 'Authorization': 'Bearer ' + token }
        });
        if (res.ok) { loadAppointments(); }
        else { alert('تعذّر إلغاء الموعد'); btn.textContent = 'إلغاء'; btn.disabled = false; }
    } catch(e) { alert('تعذّر الاتصال بالخادم'); btn.textContent = 'إلغاء'; btn.disabled = false; }
}
loadAppointments();
</script>
@endsection