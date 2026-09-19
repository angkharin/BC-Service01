<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BC Service | ลูกค้าสัมพันธ์และติดตามสถานะงาน</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
:root {
  --navy: #17345d;
  --blue: #2563a8;
  --bg: #f4f7fb;
  --text: #172033;
  --muted: #64748b;
  --line: #e2e8f0;
  --green: #10b981;
  --green-bg: #ecfdf5;
  --amber: #f59e0b;
  --amber-bg: #fffbeb;
  --red: #ef4444;
  --red-bg: #fef2f2;
  --white: #ffffff;
  --shadow: 0 10px 25px -5px rgba(23, 52, 93, 0.08);
}
* { box-sizing: border-box; }
body { margin: 0; font-family: "Noto Sans Thai", Tahoma, sans-serif; background: var(--bg); color: var(--text); }
button, input, select, textarea { font: inherit; }
button { cursor: pointer; }

/* Navbar */
.navbar { background: var(--navy); color: var(--white); padding: 0 28px; height: 70px; display: flex; align-items: center; justify-content: space-between; box-shadow: var(--shadow); position: sticky; top: 0; z-index: 50; }
.brand { display: flex; align-items: center; gap: 12px; }
.brand-logo { width: 40px; height: 40px; background: var(--white); color: var(--navy); border-radius: 10px; font-weight: 800; font-size: 19px; display: grid; place-items: center; }
.brand-info strong { font-size: 19px; display: block; line-height: 1.2; }
.brand-info small { font-size: 11px; opacity: 0.8; font-weight: 300; }
.nav-user { display: flex; align-items: center; gap: 16px; }
.user-badge { font-size: 13px; background: rgba(255,255,255,0.12); padding: 6px 14px; border-radius: 20px; }

/* Container */
.container { max-width: 1200px; margin: 30px auto; padding: 0 20px; }
.hero { background: linear-gradient(135deg, #17345d 0%, #2563a8 100%); color: var(--white); border-radius: 18px; padding: 32px 30px; margin-bottom: 25px; box-shadow: var(--shadow); display: flex; justify-content: space-between; align-items: center; }
.hero h1 { margin: 0 0 8px; font-size: 26px; }
.hero p { margin: 0; font-size: 14px; opacity: 0.9; }

/* Auth Form */
.auth-wrapper { min-height: 75vh; display: flex; align-items: center; justify-content: center; }
.auth-card { background: var(--white); border-radius: 18px; box-shadow: var(--shadow); width: 100%; max-width: 440px; padding: 35px; border: 1px solid var(--line); }
.auth-title { font-size: 22px; font-weight: 700; margin-bottom: 6px; text-align: center; color: var(--navy); }
.auth-sub { font-size: 13px; color: var(--muted); text-align: center; margin-bottom: 22px; }
.auth-tabs { display: flex; gap: 8px; margin-bottom: 20px; background: #eef2f7; padding: 4px; border-radius: 10px; }
.auth-tab { flex: 1; border: 0; background: transparent; padding: 8px; border-radius: 8px; font-size: 13px; font-weight: 600; color: var(--muted); }
.auth-tab.active { background: var(--white); color: var(--navy); box-shadow: 0 2px 8px rgba(0,0,0,0.06); }

/* Components */
.field { margin-bottom: 15px; }
.field label { display: block; font-size: 12px; font-weight: 700; margin-bottom: 6px; color: #334155; }
input, select, textarea { width: 100%; padding: 10px 13px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 14px; outline: none; }
input:focus, select:focus, textarea:focus { border-color: var(--blue); box-shadow: 0 0 0 3px rgba(37,99,168,0.12); }
.btn { border: 0; padding: 10px 18px; border-radius: 10px; font-size: 14px; font-weight: 600; display: inline-flex; align-items: center; justify-content: center; gap: 8px; }
.btn-primary { background: var(--blue); color: var(--white); width: 100%; }
.btn-navy { background: var(--navy); color: var(--white); }
.btn-outline { background: transparent; border: 1px solid var(--line); color: var(--text); }
.btn-sm { padding: 6px 12px; font-size: 12px; border-radius: 8px; }

/* Grid & Panels */
.grid-stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 25px; }
.stat-card { background: var(--white); border-radius: 16px; padding: 20px; border: 1px solid var(--line); box-shadow: var(--shadow); }
.stat-label { font-size: 13px; color: var(--muted); }
.stat-value { font-size: 26px; font-weight: 800; color: var(--navy); margin-top: 6px; }

.panel { background: var(--white); border-radius: 18px; border: 1px solid var(--line); box-shadow: var(--shadow); padding: 24px; margin-bottom: 25px; }
.panel-head { display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px; }
.panel-head h2 { margin: 0; font-size: 18px; color: var(--navy); }

/* Table */
table { width: 100%; border-collapse: collapse; }
th, td { padding: 12px 10px; text-align: left; border-bottom: 1px solid var(--line); font-size: 13px; }
th { color: var(--muted); font-weight: 600; background: #f8fafc; }
.badge { display: inline-block; padding: 4px 10px; border-radius: 16px; font-size: 12px; font-weight: 600; }
.badge-green { background: var(--green-bg); color: var(--green); }
.badge-amber { background: var(--amber-bg); color: var(--amber); }
.badge-red { background: var(--red-bg); color: var(--red); }
.badge-blue { background: #eaf3ff; color: var(--blue); }

.item-row { display: flex; gap: 10px; margin-bottom: 10px; }
.calc-box { background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 12px; padding: 18px; margin-top: 15px; }
.calc-line { display: flex; justify-content: space-between; margin-bottom: 8px; font-size: 14px; }
.calc-line.total { font-size: 18px; font-weight: 800; color: var(--navy); border-top: 1px solid var(--line); padding-top: 10px; margin-top: 10px; }
.empty { text-align: center; padding: 35px; color: var(--muted); }
</style>
</head>
<body>

<div id="app"></div>

<script>
// ใช้งานฐานข้อมูลชุดเดียวกันกับ backend index.php
const defaultDB = {
  customers: [
    {id:1, code:"CUS001", name:"บริษัท บ้านดี จำกัด", phone:"0811111111", email:"contact@bandee.local", address:"กรุงเทพมหานคร"},
    {id:2, code:"CUS002", name:"คุณวิชัย", phone:"0822222222", email:"wichai@example.com", address:"ปทุมธานี"}
  ],
  equipment: [
    {id:1, code:"EQ001", name:"โถสุขภัณฑ์", category:"สุขภัณฑ์", unit:"ชิ้น", stock:10, price:2500, reorder:3},
    {id:2, code:"EQ002", name:"อ่างล้างหน้า", category:"สุขภัณฑ์", unit:"ชิ้น", stock:8, price:1800, reorder:2},
    {id:3, code:"EQ003", name:"ก๊อกน้ำ", category:"อุปกรณ์ประปา", unit:"ชิ้น", stock:20, price:650, reorder:5},
    {id:4, code:"EQ004", name:"สายชำระ", category:"อุปกรณ์ประปา", unit:"ชุด", stock:15, price:350, reorder:4}
  ],
  quotation: [
    {id:1, no:"QT-2026-001", customer:"บริษัท บ้านดี จำกัด", employee:"สมชาย ใจดี", date:"2026-09-05", cost:5000, markup:30, total:6500, status:"อนุมัติแล้ว"}
  ],
  installation: [
    {id:1, no:"INS-2026-001", customer:"บริษัท บ้านดี จำกัด", employee:"สมชาย ใจดี", date:"2026-09-10", total:6500, paid:2000, status:"กำลังติดตั้ง", payment:"ชำระบางส่วน"}
  ]
};

let db = JSON.parse(localStorage.getItem("bc_service_db") || "null") || defaultDB;
function saveDB() { localStorage.setItem("bc_service_db", JSON.stringify(db)); }

let currentCustomer = JSON.parse(sessionStorage.getItem("bc_current_customer") || "null");
let authTab = "login";
let quoteItems = [{ equipId: "", qty: 1 }];

function money(num) {
  return Number(num || 0).toLocaleString("th-TH", { minimumFractionDigits: 2 });
}

function render() {
  const app = document.getElementById("app");
  if (!currentCustomer) {
    app.innerHTML = renderAuth();
  } else {
    app.innerHTML = renderPortal();
  }
}

function renderAuth() {
  return `
  <div class="auth-wrapper">
    <div class="auth-card">
      <div style="text-align:center; margin-bottom:15px;">
        <div style="font-size:38px">🚿</div>
        <div class="auth-title">BC Service Customer Portal</div>
        <div class="auth-sub">บริการรับเหมาติดตั้งสุขภัณฑ์และระบบประปา</div>
      </div>

      <div class="auth-tabs">
        <button class="auth-tab ${authTab === 'login' ? 'active' : ''}" onclick="authTab='login'; render();">เข้าสู่ระบบ</button>
        <button class="auth-tab ${authTab === 'register' ? 'active' : ''}" onclick="authTab='register'; render();">ลงทะเบียนใหม่</button>
      </div>

      ${authTab === 'login' ? `
        <form onsubmit="handleLogin(event)">
          <div class="field">
            <label>ชื่อลูกค้า หรือ เบอร์โทรศัพท์</label>
            <input type="text" id="loginKey" placeholder="เช่น บริษัท บ้านดี จำกัด หรือ 0811111111" required>
          </div>
          <button class="btn btn-primary" style="margin-top:10px;">เข้าสู่ระบบ</button>
          <div style="text-align:center; margin-top:15px;">
            <button type="button" class="btn btn-outline btn-sm" onclick="demoLogin()">⚡ ล็อกอินทดสอบ (บริษัท บ้านดี จำกัด)</button>
          </div>
        </form>
      ` : `
        <form onsubmit="handleRegister(event)">
          <div class="field">
            <label>ชื่อลูกค้า / บริษัท</label>
            <input type="text" id="regName" placeholder="เช่น สมเกียรติ สุขใจ" required>
          </div>
          <div class="field">
            <label>เบอร์โทรศัพท์ติดต่อ</label>
            <input type="tel" id="regPhone" placeholder="08xxxxxxxx" required>
          </div>
          <div class="field">
            <label>อีเมล</label>
            <input type="email" id="regEmail" placeholder="customer@mail.com">
          </div>
          <div class="field">
            <label>ที่อยู่หน้างาน / สถานที่ติดตั้ง</label>
            <textarea id="regAddress" rows="2" placeholder="ที่อยู่สำหรับการติดตั้ง..." required></textarea>
          </div>
          <button class="btn btn-primary" style="margin-top:10px;">ลงทะเบียนและเริ่มต้นใช้งาน</button>
        </form>
      `}
    </div>
  </div>`;
}

function demoLogin() {
  currentCustomer = db.customers[0] || { name: "บริษัท บ้านดี จำกัด", phone: "0811111111" };
  sessionStorage.setItem("bc_current_customer", JSON.stringify(currentCustomer));
  render();
}

function handleLogin(e) {
  e.preventDefault();
  const val = document.getElementById("loginKey").value.trim().toLowerCase();
  const found = db.customers.find(c => c.name.toLowerCase().includes(val) || (c.phone && c.phone.includes(val)));
  if (found) {
    currentCustomer = found;
    sessionStorage.setItem("bc_current_customer", JSON.stringify(currentCustomer));
    render();
  } else {
    alert("ไม่พบข้อมูลลูกค้าในระบบ กรุณาตรวจสอบหรือลงทะเบียนใหม่");
  }
}

function handleRegister(e) {
  e.preventDefault();
  const name = document.getElementById("regName").value.trim();
  const phone = document.getElementById("regPhone").value.trim();
  const email = document.getElementById("regEmail").value.trim();
  const address = document.getElementById("regAddress").value.trim();

  const nextId = db.customers.length ? Math.max(...db.customers.map(x => x.id)) + 1 : 1;
  const newC = { id: nextId, code: "CUS" + String(nextId).padStart(3, "0"), name, phone, email, address };
  db.customers.push(newC);
  saveDB();

  currentCustomer = newC;
  sessionStorage.setItem("bc_current_customer", JSON.stringify(currentCustomer));
  alert("ลงทะเบียนสำเร็จ!");
  render();
}

function handleLogout() {
  sessionStorage.removeItem("bc_current_customer");
  currentCustomer = null;
  render();
}

function renderPortal() {
  const myQuotes = (db.quotation || []).filter(q => q.customer === currentCustomer.name);
  const myInstalls = (db.installation || []).filter(i => i.customer === currentCustomer.name);
  const totalSpent = myInstalls.reduce((a, b) => a + (b.total || 0), 0);
  const totalPaid = myInstalls.reduce((a, b) => a + (b.paid || 0), 0);
  const totalRemain = Math.max(0, totalSpent - totalPaid);

  return `
  <nav class="navbar">
    <div class="brand">
      <div class="brand-logo">BC</div>
      <div class="brand-info">
        <strong>BC Service</strong>
        <small>Portal หน้าบ้านสำหรับลูกค้า</small>
      </div>
    </div>
    <div class="nav-user">
      <span class="user-badge">👤 ${currentCustomer.name}</span>
      <button class="btn btn-outline btn-sm" style="color:#fff; border-color:rgba(255,255,255,0.3)" onclick="handleLogout()">ออกจากระบบ</button>
    </div>
  </nav>

  <div class="container">
    <div class="hero">
      <div>
        <h1>สวัสดีคุณ ${currentCustomer.name}</h1>
        <p>ติดตามงานติดตั้งสุขภัณฑ์และประเมินราคางานจัดจ้างได้ทันที</p>
      </div>
      <button class="btn btn-navy" onclick="document.getElementById('quotationFormSection').scrollIntoView({behavior:'smooth'})">
        + ขอใบเสนอราคาใหม่
      </button>
    </div>

    <div class="grid-stats">
      <div class="stat-card">
        <div class="stat-label">ใบเสนอราคาของคุณ</div>
        <div class="stat-value">${myQuotes.length} รายการ</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">งานติดตั้งที่กำลังดำเนินการ</div>
        <div class="stat-value">${myInstalls.length} งาน</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">ยอดคงเหลือที่ต้องชำระ</div>
        <div class="stat-value" style="color:${totalRemain > 0 ? 'var(--red)' : 'var(--green)'}">${money(totalRemain)} บาท</div>
      </div>
    </div>

    <div class="panel">
      <div class="panel-head">
        <h2>🛠️ สถานะงานติดตั้งและการชำระเงิน</h2>
      </div>
      ${myInstalls.length ? `
        <table>
          <thead>
            <tr>
              <th>เลขที่งาน</th>
              <th>วันที่ติดตั้ง</th>
              <th>ช่างผู้ดูแล</th>
              <th>ยอดรวม</th>
              <th>ชำระแล้ว (มัดจำ)</th>
              <th>คงเหลือ</th>
              <th>สถานะงาน</th>
              <th>สถานะชำระเงิน</th>
              <th>เอกสาร</th>
            </tr>
          </thead>
          <tbody>
            ${myInstalls.map(item => `
              <tr>
                <td><strong>${item.no}</strong></td>
                <td>${item.date}</td>
                <td>${item.employee || "สมชาย ใจดี"}</td>
                <td>${money(item.total)} บาท</td>
                <td><b style="color:var(--green)">${money(item.paid)} บาท</b></td>
                <td><b style="color:${(item.total - item.paid) > 0 ? 'var(--red)' : 'inherit'}">${money(Math.max(0, item.total - item.paid))} บาท</b></td>
                <td><span class="badge badge-blue">${item.status}</span></td>
                <td><span class="badge ${item.payment === 'ชำระแล้ว' ? 'badge-green' : item.payment === 'ชำระบางส่วน' ? 'badge-amber' : 'badge-red'}">${item.payment}</span></td>
                <td><button class="btn btn-outline btn-sm" onclick="printReceipt(${item.id})">🖨️ พิมพ์ใบเสร็จ</button></td>
              </tr>
            `).join("")}
          </tbody>
        </table>
      ` : `<div class="empty">ยังไม่มีรายการงานติดตั้งของคุณในขณะนี้</div>`}
    </div>

    <div class="panel" id="quotationFormSection">
      <div class="panel-head">
        <h2>📝 ขอใบเสนอราคา & ประเมินค่างานจัดจ้าง (คิดมัดจำ 30%)</h2>
      </div>
      <form onsubmit="submitQuote(event)">
        <div class="field">
          <label>ชื่องาน / รายละเอียดการติดตั้ง</label>
          <input type="text" id="jobDesc" placeholder="เช่น ติดตั้งโถสุขภัณฑ์ 2 ห้อง และเปลี่ยนชุดก๊อกน้ำ" required>
        </div>

        <label style="font-size:12px; font-weight:700; display:block; margin-bottom:6px;">เลือกวัสดุ / อุปกรณ์ที่ต้องการติดตั้ง:</label>
        <div id="itemsContainer">
          ${quoteItems.map((item, idx) => `
            <div class="item-row">
              <select style="flex:2" onchange="quoteItems[${idx}].equipId=this.value; refreshCalc();" required>
                <option value="">-- เลือกอุปกรณ์ / สุขภัณฑ์ --</option>
                ${db.equipment.map(eq => `
                  <option value="${eq.id}" ${item.equipId == eq.id ? 'selected' : ''}>${eq.name} (${eq.category}) - ${money(eq.price)} บาท/${eq.unit}</option>
                `).join("")}
              </select>
              <input type="number" min="1" value="${item.qty}" style="flex:1" placeholder="จำนวน" onchange="quoteItems[${idx}].qty=+this.value||1; refreshCalc();" required>
              <button type="button" class="btn btn-outline btn-sm" style="color:var(--red)" onclick="removeItemRow(${idx})">ลบ</button>
            </div>
          `).join("")}
        </div>
        <button type="button" class="btn btn-outline btn-sm" onclick="quoteItems.push({equipId:'', qty:1}); render();">+ เพิ่มรายการอุปกรณ์</button>

        <div class="calc-box" id="calcArea"></div>

        <div style="margin-top:20px; text-align:right;">
          <button class="btn btn-navy">ยืนยันส่งคำขอใบเสนอราคา</button>
        </div>
      </form>
    </div>

  </div>`;
}

function refreshCalc() {
  const cost = quoteItems.reduce((acc, it) => {
    const eq = db.equipment.find(e => e.id == it.equipId);
    return acc + (eq ? eq.price * (it.qty || 1) : 0);
  }, 0);
  const markup = cost * 0.30;
  const total = cost + markup;
  const deposit = total * 0.30;
  const el = document.getElementById("calcArea");
  if (!el) return;
  el.innerHTML = `
    <div class="calc-line"><span>ต้นทุนวัสดุอุปกรณ์:</span> <span>${money(cost)} บาท</span></div>
    <div class="calc-line"><span>ค่าดำเนินการและบริการ (30%):</span> <span>${money(markup)} บาท</span></div>
    <div class="calc-line total"><span>ยอดเสนอราคารวม:</span> <span>${money(total)} บาท</span></div>
    <div class="calc-line" style="color:var(--blue); font-weight:700;"><span>ยอดเงินมัดจำล่วงหน้า (30%):</span> <span>${money(deposit)} บาท</span></div>
    <div class="calc-line" style="color:var(--muted)"><span>ยอดส่วนที่เหลือชำระเมื่องานเสร็จ:</span> <span>${money(total - deposit)} บาท</span></div>
  `;
}

function removeItemRow(idx) {
  if (quoteItems.length > 1) {
    quoteItems.splice(idx, 1);
    render();
  } else {
    alert("ต้องมีรายการวัสดุอย่างน้อย 1 รายการ");
  }
}

function submitQuote(e) {
  e.preventDefault();
  const cost = quoteItems.reduce((acc, it) => {
    const eq = db.equipment.find(e => e.id == it.equipId);
    return acc + (eq ? eq.price * (it.qty || 1) : 0);
  }, 0);
  if (cost <= 0) {
    alert("กรุณาเลือกอุปกรณ์สุขภัณฑ์");
    return;
  }
  const total = cost + (cost * 0.30);
  const deposit = total * 0.30;
  const qNo = "QT-" + new Date().getFullYear() + "-" + String(Date.now()).slice(-4);
  const iNo = "INS-" + new Date().getFullYear() + "-" + String(Date.now()).slice(-4);

  db.quotation.push({
    id: (db.quotation.length ? Math.max(...db.quotation.map(x => x.id)) + 1 : 1),
    no: qNo,
    customer: currentCustomer.name,
    employee: "สมชาย ใจดี",
    date: new Date().toISOString().slice(0, 10),
    cost, markup: 30, total, status: "เสนอราคา"
  });

  db.installation.push({
    id: (db.installation.length ? Math.max(...db.installation.map(x => x.id)) + 1 : 1),
    no: iNo,
    customer: currentCustomer.name,
    employee: "สมชาย ใจดี",
    date: new Date().toISOString().slice(0, 10),
    total, paid: deposit, remain: total - deposit,
    status: "รอติดตั้ง", payment: "ชำระบางส่วน"
  });

  saveDB();
  alert(`ส่งคำขอเรียบร้อย!\nเลขที่ใบเสนอราคา: ${qNo}\nยอดรวม: ${money(total)} บาท\nเงินมัดจำ (30%): ${money(deposit)} บาท`);
  quoteItems = [{ equipId: "", qty: 1 }];
  render();
}

function printReceipt(id) {
  const item = db.installation.find(x => x.id == id);
  if (!item) return;
  const w = window.open("", "_blank");
  w.document.write(`
    <html lang="th">
    <head><meta charset="UTF-8"><title>ใบเสร็จรับเงิน - BC Service</title>
    <style>body{font-family:Tahoma,sans-serif;padding:35px;color:#222}h1{text-align:center;color:#17345d}table{width:100%;border-collapse:collapse;margin-top:20px}th,td{border:1px solid #cbd5e1;padding:10px}th{background:#f8fafc}.r{text-align:right}</style>
    </head><body>
      <h1>BC Service - ใบเสร็จรับเงินค่ามัดจำ</h1>
      <p><b>เลขที่:</b> ${item.no}<br><b>ลูกค้า:</b> ${item.customer}<br><b>วันที่:</b> ${item.date}<br><b>ช่างผู้รับผิดชอบ:</b> ${item.employee}</p>
      <table>
        <tr><th>รายการ</th><th class="r">จำนวนเงิน</th></tr>
        <tr><td>ยอดจัดจ้างติดตั้งรวม</td><td class="r">${money(item.total)} บาท</td></tr>
        <tr><td><b>ยอดเงินมัดจำ (30%) ที่ชำระแล้ว</b></td><td class="r" style="color:green"><b>${money(item.paid)} บาท</b></td></tr>
        <tr><td>ยอดคงเหลือที่ต้องชำระเมื่องานเสร็จ</td><td class="r" style="color:red">${money(Math.max(0, item.total - item.paid))} บาท</td></tr>
      </table>
      <div style="display:flex;justify-content:space-between;margin-top:60px;text-align:center">
        <div>____________________<br>ผู้รับเงิน (BC Service)</div>
        <div>____________________<br>ผู้ว่าจ้าง</div>
      </div>
      <script>window.print();<\/script>
    </body></html>
  `);
  w.document.close();
}

render();
setTimeout(refreshCalc, 50);
</script>
</body>
</html>