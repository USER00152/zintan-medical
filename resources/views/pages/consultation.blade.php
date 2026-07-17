@extends('layouts.app')

@section('title', 'تواصل مع طبيبك — منصة الزنتان الطبية')

@section('styles')
<style>
.cons-lay{display:grid;grid-template-columns:270px 1fr;gap:18px;padding-top:22px;padding-bottom:40px}
.doc-list{background:var(--card);border:1.5px solid var(--bdr);border-radius:var(--r22);overflow:hidden}
.dl-hd{padding:14px 18px;border-bottom:1px solid var(--bds)}
.dl-hd h3{font-size:14px;font-weight:800;color:var(--td)}
.dl-item{display:flex;align-items:center;gap:11px;padding:12px 18px;border-bottom:1px solid var(--bds);cursor:pointer;transition:.2s}
.dl-item:hover,.dl-item.on{background:var(--pl)}
.dl-item.on{border-right:3px solid var(--p)}
.dl-av{width:42px;height:42px;border-radius:50%;background:linear-gradient(135deg,var(--p),var(--pd));color:#fff;display:flex;align-items:center;justify-content:center;font-size:15px;font-weight:800;flex-shrink:0}
.dl-nm{font-size:13px;font-weight:700;color:var(--td)}
.dl-sp{font-size:11px;color:var(--p);font-weight:600}
.online-dot{width:8px;height:8px;border-radius:50%;background:#22a55e;margin-right:auto;flex-shrink:0}
.chat-area{background:var(--card);border:1.5px solid var(--bdr);border-radius:var(--r22);display:flex;flex-direction:column;min-height:520px}
.chat-hd{padding:14px 20px;border-bottom:1px solid var(--bds);display:flex;align-items:center;gap:12px}
.chat-hd-info h3{font-size:14.5px;font-weight:800;color:var(--td)}
.chat-hd-info p{font-size:11.5px;color:#22a55e;font-weight:600}
.chat-msgs{flex:1;padding:18px;display:flex;flex-direction:column;gap:13px;overflow-y:auto;max-height:400px}
.msg{max-width:72%;padding:11px 14px;border-radius:16px;font-size:13px;line-height:1.6}
.msg-me{background:var(--p);color:#fff;align-self:flex-end;border-bottom-left-radius:4px}
.msg-dr{background:var(--bg);color:var(--td);align-self:flex-start;border-bottom-right-radius:4px;border:1px solid var(--bdr)}
.msg-time{font-size:10px;opacity:.6;margin-top:4px;display:block}
.msg-file{display:flex;align-items:center;gap:9px;background:rgba(255,255,255,.15);border-radius:var(--r8);padding:9px 12px;margin-top:7px;font-size:12px;cursor:pointer}
.msg-dr .msg-file{background:var(--pl)}
.msg-file svg{width:16px;height:16px;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round;flex-shrink:0}
.chat-inp{padding:13px 18px;border-top:1px solid var(--bds);display:flex;align-items:center;gap:9px}
.chat-inp input{flex:1;padding:10px 14px;border:1.5px solid var(--bdr);border-radius:var(--rF);font-size:13px;color:var(--td);background:var(--bg);font-family:var(--font)}
.chat-inp input:focus{outline:none;border-color:var(--p)}
.send-btn{width:40px;height:40px;border-radius:50%;background:var(--p);color:#fff;border:none;display:flex;align-items:center;justify-content:center;cursor:pointer;flex-shrink:0}
.send-btn svg{width:16px;height:16px;fill:none;stroke:#fff;stroke-width:2;stroke-linecap:round}
.file-btn{width:40px;height:40px;border-radius:50%;background:var(--bg);border:1.5px solid var(--bdr);display:flex;align-items:center;justify-content:center;cursor:pointer;flex-shrink:0;color:var(--tm)}
.file-btn svg{width:16px;height:16px;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round}
.empty-chat{display:flex;flex-direction:column;align-items:center;justify-content:center;flex:1;padding:40px;text-align:center;color:var(--tm)}
.empty-chat h3{font-size:16px;color:var(--td);font-weight:700;margin-bottom:6px}
.loading-state{text-align:center;padding:30px;color:var(--tm);font-size:13px}
</style>
@endsection

@section('content')
<div class="pg-hd">
  <div class="si">
    <div class="bc"><span>الرئيسية</span><span>/</span><span class="cur">تواصل مع طبيبك</span></div>
    <h1>تواصل مع طبيبك</h1>
    <p>أرسل رسائلك وتقاريرك مباشرة إلى طبيبك</p>
  </div>
</div>

<div class="si" style="padding:0 28px">
  <div class="cons-lay">
    <div class="doc-list">
      <div class="dl-hd"><h3>الأطباء المتاحون</h3></div>
      <div id="my-doctors"><div class="loading-state">جاري التحميل...</div></div>
    </div>
    <div class="chat-area" id="chat-area">
      <div class="empty-chat">
        <svg width="60" height="60" fill="none" stroke="var(--tl)" stroke-width="1.5" stroke-linecap="round" viewBox="0 0 24 24" style="margin-bottom:16px"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        <h3>اختر طبيباً للمحادثة</h3>
        <p style="font-size:13px">اختر من قائمة الأطباء للبدء في المحادثة</p>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
let selectedDoc = null;
let messages = [];

async function loadMyDoctors() {
    try {
        const res = await fetch(API + '/doctors', {
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + token
            }
        });
        const doctors = await res.json();

        if (!doctors.length) {
            document.getElementById('my-doctors').innerHTML = '<div class="loading-state">لا يوجد أطباء متاحون</div>';
            return;
        }

        let html = '';
        doctors.forEach(function(d) {
            const initial = d.user && d.user.name ? d.user.name.charAt(0) : 'د';
            const name    = d.user && d.user.name ? d.user.name : 'طبيب';
            const spec    = d.specialty && d.specialty.name_ar ? d.specialty.name_ar : '';
            html += '<div class="dl-item" onclick="openChat(' + JSON.stringify(d).replace(/'/g,"\\'") + ',this)">';
            html += '<div class="dl-av">' + initial + '</div>';
            html += '<div><div class="dl-nm">' + name + '</div><div class="dl-sp">' + spec + '</div></div>';
            html += '<div class="online-dot"></div></div>';
        });
        document.getElementById('my-doctors').innerHTML = html;
    } catch(e) {
        document.getElementById('my-doctors').innerHTML = '<div class="loading-state">تعذّر التحميل</div>';
    }
}

function openChat(doctor, el) {
    document.querySelectorAll('.dl-item').forEach(function(d){d.classList.remove('on')});
    el.classList.add('on');
    selectedDoc = doctor;

    const initial = doctor.user && doctor.user.name ? doctor.user.name.charAt(0) : 'د';
    const name    = doctor.user && doctor.user.name ? doctor.user.name : 'طبيب';

    messages = [
        { from:'dr', text:'مرحباً، كيف حالك اليوم؟ هل هناك تحسن في الأعراض؟', time:'10:30' },
        { from:'me', text:'الحمد لله، هناك تحسن ملحوظ. لكن لا زال عندي بعض الألم أحياناً.', time:'10:32' },
        { from:'dr', text:'جيد. هل قمت بعمل التحليل الذي طلبته؟ أرسل لي النتيجة.', time:'10:34' },
        { from:'me', text:'نعم، إليك نتيجة التحليل:', file:'تحليل_الدم_2026.pdf', time:'10:36' },
        { from:'dr', text:'شكراً، راجعت النتيجة. كل شيء طبيعي. استمر في الأدوية وسأراك في الموعد القادم.', time:'10:40' },
    ];

    renderChat(initial, name);
}

function renderChat(initial, name) {
    let msgsHtml = '';
    messages.forEach(function(m) {
        const cls = m.from === 'me' ? 'msg-me' : 'msg-dr';
        msgsHtml += '<div class="msg ' + cls + '">' + m.text;
        if (m.file) {
            msgsHtml += '<div class="msg-file"><svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>' + m.file + '</div>';
        }
        msgsHtml += '<span class="msg-time">' + m.time + '</span></div>';
    });

    document.getElementById('chat-area').innerHTML =
        '<div class="chat-hd">' +
        '<div class="dl-av">' + initial + '</div>' +
        '<div class="chat-hd-info"><h3>' + name + '</h3><p>متصل الآن</p></div>' +
        '</div>' +
        '<div class="chat-msgs" id="chat-msgs">' + msgsHtml + '</div>' +
        '<div class="chat-inp">' +
        '<button class="file-btn" onclick="sendFile()"><svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="12" y1="18" x2="12" y2="12"/><line x1="9" y1="15" x2="15" y2="15"/></svg></button>' +
        '<input type="text" id="msg-inp" placeholder="اكتب رسالتك..." onkeydown="if(event.key===\'Enter\') sendMsg()">' +
        '<button class="send-btn" onclick="sendMsg()"><svg viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg></button>' +
        '</div>';

    setTimeout(function() {
        const msgs = document.getElementById('chat-msgs');
        if (msgs) msgs.scrollTop = msgs.scrollHeight;
    }, 100);
}

function sendMsg() {
    const inp = document.getElementById('msg-inp');
    const txt = inp.value.trim();
    if (!txt || !selectedDoc) return;
    const now = new Date();
    const time = now.getHours() + ':' + String(now.getMinutes()).padStart(2,'0');
    messages.push({ from:'me', text:txt, time:time });
    inp.value = '';
    const initial = selectedDoc.user && selectedDoc.user.name ? selectedDoc.user.name.charAt(0) : 'د';
    const name    = selectedDoc.user && selectedDoc.user.name ? selectedDoc.user.name : 'طبيب';
    renderChat(initial, name);
    document.getElementById('msg-inp').focus();
}

function sendFile() {
    const input = document.createElement('input');
    input.type = 'file';
    input.accept = '.pdf,.jpg,.png,.docx';
    input.onchange = function() {
        if (!input.files.length || !selectedDoc) return;
        const file = input.files[0];
        const now = new Date();
        const time = now.getHours() + ':' + String(now.getMinutes()).padStart(2,'0');
        messages.push({ from:'me', text:'تم إرسال ملف:', file:file.name, time:time });
        const initial = selectedDoc.user && selectedDoc.user.name ? selectedDoc.user.name.charAt(0) : 'د';
        const name    = selectedDoc.user && selectedDoc.user.name ? selectedDoc.user.name : 'طبيب';
        renderChat(initial, name);
    };
    input.click();
}

loadMyDoctors();
</script>
@endsection