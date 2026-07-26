async function addDoctor(){
  const name  = document.getElementById('d-name').value.trim();
  const phone = document.getElementById('d-phone').value.trim();
  const spec  = document.getElementById('d-spec').value;
  const exp   = document.getElementById('d-exp').value;
  const bio   = document.getElementById('d-bio').value.trim();

  if(!name || !phone || !spec){
    toast('يرجى تعبئة الاسم والهاتف والتخصص',true);
    return;
  }

  try {
    // إنشاء حساب الطبيب بـ phone كمعرّف
    const r = await fetch(API+'/register', {
      method:'POST',
      headers:{'Content-Type':'application/json','Accept':'application/json'},
      body: JSON.stringify({
        name: name,
        phone: phone,
        role: 'doctor'
      })
    });
    const u = await r.json();
    if(!r.ok){
      toast(u.errors ? Object.values(u.errors).flat().join(' | ') : (u.message||'خطأ في إنشاء الحساب'), true);
      return;
    }

    // إنشاء الملف الطبي
    const r2 = await fetch(API+'/doctors', {
      method:'POST',
      headers:{...H, 'Authorization':'Bearer '+u.token},
      body: JSON.stringify({
        specialty_id: spec,
        years_experience: exp||0,
        bio: bio
      })
    });

    if(r2.ok){
      toast('تم إضافة الطبيب بنجاح ✓');
      ['d-name','d-phone','d-exp','d-bio'].forEach(function(id){
        document.getElementById(id).value='';
      });
      document.getElementById('d-spec').value='';
      loadAll();
    } else {
      const err = await r2.json();
      toast(err.message||'تم إنشاء الحساب لكن فشل إنشاء الملف الطبي', true);
    }
  } catch(e){
    toast('خطأ في الاتصال',true);
  }
}