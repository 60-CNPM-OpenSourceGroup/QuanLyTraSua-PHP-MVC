create database quanlytrasua;
use quanlytrasua;

create table NhomNhanVien (
	IDNhom varchar(20) not null primary key,
	TenNhom varchar(50) not null
);

create table NhanVien (
	maNV varchar(10) not null,
	tenNV varchar(50) not null,
	gioiTinh tinyint not null,
	ngaySinh date not null,
	diaChi varchar(50) not null,
	email varchar(50) not null,
	password varchar(50) not null,
	sdt varchar(20) not null,
	hinhAnh varchar(250) not null,
	IDNhom varchar(20) not null,
	constraint nv_pk primary key (maNV),
	constraint nv_nnv_fk foreign key (IDNhom) references NhomNhanVien (IDNhom)
	ON UPDATE CASCADE
	ON DELETE CASCADE
);

create table LoaiDoUong(
	MaLoaiDU varchar(20) NOT NULL,
	TenLoaiDU varchar(50) NOT NULL,
	constraint ldu_pk primary key (MaLoaiDU)
);

create table DoUong(
	MaDU varchar(10) NOT NULL,
	TenDU varchar(250) NOT NULL,
	DonGia int NOT NULL,
	HinhAnh varchar(250) NOT NULL,
	NgayThem datetime(3) NOT NULL,
	BanChay tinyint not null,
	MaLoaiDU varchar(20) NOT NULL,
	constraint du_pk primary key (MaDU),
	constraint du_ldu_fk foreign key (MaLoaiDU) references LoaiDoUong (MaLoaiDU)
	ON UPDATE CASCADE
	ON DELETE CASCADE
);

create table LoaiTopping(
	MaLoaiTP varchar(10) NOT NULL,
	TenLoaiTP varchar(250) NOT NULL,
	constraint ltp_pk primary key (MaLoaiTP)
);

create table Topping(
	MaTP varchar(10) NOT NULL,
	TenTP varchar(250) NOT NULL,
	DonGia int NOT NULL,
	HinhAnh varchar(250) NOT NULL,
	MaLoaiTP varchar(10) NOT NULL,
	constraint tp_pk primary key (MaTP),
	constraint tp_ltp_fk foreign key (MaLoaiTP) references LoaiTopping (MaLoaiTP)
	ON UPDATE CASCADE
	ON DELETE CASCADE
);

create table HoaDon(
	MaHD varchar(50) NOT NULL,
	HoTen varchar(100) NOT NULL,
	Sdt varchar(20) NOT NULL,
	DiaChi varchar(250) NOT NULL,
	GhiChu varchar(250),
	TongTien int NOT NULL,
	NgayLap datetime(3) NOT NULL,
	TinhTrang int NOT NULL,
	MaNV varchar(10),
	constraint hd_pk primary key (MaHD),
	constraint hd_nv_fk foreign key (MaNV) references NhanVien(MaNV)
	ON UPDATE CASCADE
	ON DELETE CASCADE
);

create table ChiTietHD (
	MaHD varchar(50) NOT NULL,
	MaDU varchar(10) NOT NULL,
	Size varchar(10) NOT NULL,
	ThoiGianThem datetime(3) NOT NULL,
	SoLuong int NOT NULL,
	PhanTramDa int NULL,
	PhanTramDuong int NULL,
	constraint cthd_pk primary key (MaHD,MaDU,ThoiGianThem),
	constraint cthd_hd_fk foreign key (MaHD) references HoaDon (MaHD)
	ON UPDATE CASCADE
	ON DELETE CASCADE,
	constraint cthd_du_fk foreign key (MaDU) references DoUong (MaDU)
	ON UPDATE CASCADE
	ON DELETE CASCADE
);

create table CTTopping (
	MaHD varchar(50) NOT NULL,
	MaDU varchar(10) NOT NULL,
	ThoiGianThem datetime(3) NOT NULL,
	MaTP varchar(10) NOT NULL,
	SoLuong int NOT NULL,
	constraint cttp_pk primary key (MaHD,MaDU,ThoiGianThem,MaTP),
	Constraint cttp_cthd foreign key (MaHD, MaDU, ThoiGianThem) references ChiTietHD (MaHD, MaDU, ThoiGianThem) 
	ON UPDATE CASCADE
	ON DELETE CASCADE,
	constraint cttp_tp_fk foreign key (MaTP) references Topping (MaTP)
	ON UPDATE CASCADE
	ON DELETE CASCADE
);

create table PhanHoi (
	id int not null primary key AUTO_INCREMENT,
	hoTen varchar(50) not null,
	sdt varchar(20) not null,
	email varchar(50) not null,
	noiDung varchar(500) not null,
	ngayGui date not null,
	tinhTrang tinyint not null
);