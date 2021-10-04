USE quanlytrasua;

-- CREATE PROCEDURE NhanVien_TimKiem
-- (
-- 	IN MaNV varchar(8),
-- 	IN TenNV nvarchar(40),
-- 	IN GioiTinh nvarchar(3),
-- 	IN DiaChi nvarchar(70),
-- 	IN Email varchar(50),
-- 	IN SDT varchar(20),
-- 	IN IDNhom varchar(20)
-- )
-- AS
-- BEGIN
-- DECLARE @SqlStr NVARCHAR(4000),
-- 		@ParamList nvarchar(2000)
-- SELECT @SqlStr = 'SELECT nv.*, nnv.TenNhom
--        FROM NhanVien nv, QuanTri qt, NhomNhanVien nnv
--        WHERE (nv.maNV = qt.maNV) AND (qt.IDNhom = nnv.IDNhom) AND (1=1)
--        '
-- IF @MaNV IS NOT NULL
--        SELECT @SqlStr = @SqlStr + '
--               AND (nv.maNV LIKE ''%'+@MaNV+'%'')
--               '
-- IF @TenNV IS NOT NULL
--        SELECT @SqlStr = @SqlStr + '
--               AND (nv.tenNV LIKE N''%'+@TenNV+'%'')
--               '
-- IF @GioiTinh IS NOT NULL
--        SELECT @SqlStr = @SqlStr + '
--              AND (nv.gioiTinh LIKE ''%'+@GioiTinh+'%'')
--              '
-- IF @DiaChi IS NOT NULL
--        SELECT @SqlStr = @SqlStr + '
--               AND (nv.diaChi LIKE N''%'+@DiaChi+'%'')
--               '
-- IF @Email IS NOT NULL
--        SELECT @SqlStr = @SqlStr + '
--               AND (nv.email LIKE ''%'+@Email+'%'')
--               '
-- IF @SDT IS NOT NULL
--        SELECT @SqlStr = @SqlStr + '
--               AND (nv.sdt LIKE ''%'+@SDT+'%'')
--               '
-- IF @IDNhom IS NOT NULL
--        SELECT @SqlStr = @SqlStr + '
--               AND (qt.IDNhom LIKE ''%'+@IDNhom+'%'')
--               '
-- 	EXEC SP_EXECUTESQL @SqlStr
-- END

USE QLTraSua;

DELIMITER $$ 
CREATE PROCEDURE NhanVien_TimKiem
(
	IN MaNV varchar(8),
	IN TenNV varchar(40),
	IN GioiTinh varchar(3),
	IN DiaChi varchar(70),
	IN Email varchar(50),
	IN SDT varchar(20),
	IN IDNhom varchar(20),
    OUT SqlStr varchar(4000)
)

BEGIN
    DECLARE SqlStr VARCHAR(4000);
    SET SqlStr = 'SELECT nv.*, nnv.TenNhom
        FROM NhanVien nv, QuanTri qt, NhomNhanVien nnv
        WHERE (nv.maNV = qt.maNV) AND (qt.IDNhom = nnv.IDNhom) AND (1=1)
        ';
    IF MaNV IS NOT NULL THEN
        SET SqlStr = SqlStr + '
            AND (nv.maNV LIKE ''%'+MaNV+'%'')
            ';
    IF TenNV IS NOT NULL THEN
        SET SqlStr = SqlStr + '
            AND (nv.tenNV LIKE N''%'+TenNV+'%'')
            ';
    IF GioiTinh IS NOT NULL THEN
        SET SqlStr = SqlStr + '
            AND (nv.gioiTinh LIKE ''%'+GioiTinh+'%'')
            ';
    IF DiaChi IS NOT NULL THEN
        SET SqlStr = SqlStr + '
            AND (nv.diaChi LIKE N''%'+DiaChi+'%'')
            ';
    IF Email IS NOT NULL THEN
        SET SqlStr = SqlStr + '
            AND (nv.email LIKE ''%'+Email+'%'')
            ';
    IF SDT IS NOT NULL THEN
        SET SqlStr = SqlStr + '
            AND (nv.sdt LIKE ''%'+SDT+'%'')
            ';
    IF IDNhom IS NOT NULL THEN
        SET SqlStr = SqlStr + '
            AND (qt.IDNhom LIKE ''%'+IDNhom+'%'')
            ';
	END IF;
    EXECUTE SqlStr;
END
DELIMITER ;

go
CREATE FUNCTION TinhTienTS
( 
	@DonGia int,
	@Size varchar(3)
)
RETURNS int AS
BEGIN
	if @Size = 'M'
		BEGIN
			RETURN @DonGia;
		END
	RETURN @DonGia + 5000;
END;
go

create procedure [dbo].[TKDT_HoaDon_ThangNam] (
	@thang int,
	@nam int
)
as
begin
	if @thang IS NOT NULL
		select 
			(select sum(hd.TongTien) as 'DoanhThu'
			from HoaDon hd
			where month(hd.NgayLap) = @thang and year(hd.NgayLap) = @nam) as 'DoanhThuTaiQuay',
			(select sum(hdonl.TongTien) as 'DoanhThuOnl'
			from HoaDonOnl hdonl
			where hdonl.TinhTrang = 2 and month(hdonl.NgayLap) = @thang and year(hdonl.NgayLap) = @nam) as 'DoanhThuTrucTuyen'
	else
		select 
			(select sum(hd.TongTien) as 'DoanhThu'
			from HoaDon hd
			where year(hd.NgayLap) = @nam) as 'DoanhThuTaiQuay',
			(select sum(hdonl.TongTien) as 'DoanhThuOnl'
			from HoaDonOnl hdonl
			where hdonl.TinhTrang = 2 and year(hdonl.NgayLap) = @nam) as 'DoanhThuTrucTuyen'
end
go

create procedure [dbo].[TKDT_SanPham_ThangNam] (
	@thang int,
	@nam int
)
as
begin
	if @thang IS NOT NULL
		select du.MaDU as 'MaSP', du.TenDU as 'TenSP', TableA.DoanhThuOff, TableB.DoanhThuOnl
		from DoUong du
		left outer join (
			select du.MaDU, sum(dbo.TinhTienTS(du.DonGia, cthd.Size) * cthd.SoLuong) as 'DoanhThuOff'
			from DoUong du, HoaDon hd, ChiTietHD cthd
			where du.MaDU = cthd.MaDU and hd.MaHD = cthd.MaHD and month(hd.NgayLap) = @thang and year(hd.NgayLap) = @nam
			group by du.MaDU ) as TableA on du.MaDU = TableA.MaDU
		left outer join (
			select du.MaDU, sum(dbo.TinhTienTS(du.DonGia, cthdo.Size) * cthdo.SoLuong) as 'DoanhThuOnl'
			from DoUong du, HoaDonOnl hdo, ChiTietHDOnl cthdo
			where du.MaDU = cthdo.MaDU and hdo.MaHDOnl = cthdo.MaHDOnl and month(hdo.NgayLap) = @thang and year(hdo.NgayLap) = @nam and hdo.TinhTrang = 2
			group by du.MaDU ) as TableB on du.MaDU = TableB.MaDU
		UNION
		select tp.MaTP as 'MaSP', tp.TenTP as 'TenSP', TableA.DoanhThuOff, TableB.DoanhThuOnl
		from Topping tp
		left outer  join (
			select tp.MaTP, sum(tp.DonGia * cttp.SoLuong) as 'DoanhThuOff'
			from Topping tp, HoaDon hd, CTTopping cttp
			where tp.MaTP = cttp.MaTP and hd.MaHD = cttp.MaHD and month(hd.NgayLap) = @thang and year(hd.NgayLap) = @nam
			group by tp.MaTP
		) as TableA on tp.MaTP = TableA.MaTP
		left outer join (
			select tp.MaTP, sum(tp.DonGia * cttpo.SoLuong) as 'DoanhThuOnl'
			from Topping tp, HoaDonOnl hdo, CTToppingOnl cttpo
			where tp.MaTP = cttpo.MaTP and hdo.MaHDOnl = cttpo.MaHDOnl and month(hdo.NgayLap) = @thang and year(hdo.NgayLap) = @nam and hdo.TinhTrang = 2
			group by tp.MaTP
		) as TableB on tp.MaTP = TableB.MaTP
	else
		select du.MaDU as 'MaSP', du.TenDU as 'TenSP', TableA.DoanhThuOff, TableB.DoanhThuOnl
		from DoUong du
		left outer join (
			select du.MaDU, sum(dbo.TinhTienTS(du.DonGia, cthd.Size) * cthd.SoLuong) as 'DoanhThuOff'
			from DoUong du, HoaDon hd, ChiTietHD cthd
			where du.MaDU = cthd.MaDU and hd.MaHD = cthd.MaHD and year(hd.NgayLap) = @nam
			group by du.MaDU ) as TableA on du.MaDU = TableA.MaDU
		left outer join (
			select du.MaDU, sum(dbo.TinhTienTS(du.DonGia, cthdo.Size) * cthdo.SoLuong) as 'DoanhThuOnl'
			from DoUong du, HoaDonOnl hdo, ChiTietHDOnl cthdo
			where du.MaDU = cthdo.MaDU and hdo.MaHDOnl = cthdo.MaHDOnl and year(hdo.NgayLap) = @nam and hdo.TinhTrang = 2
			group by du.MaDU ) as TableB on du.MaDU = TableB.MaDU
		UNION
		select tp.MaTP as 'MaSP', tp.TenTP as 'TenSP', TableA.DoanhThuOff, TableB.DoanhThuOnl
		from Topping tp
		left outer join (
			select tp.MaTP, sum(tp.DonGia * cttp.SoLuong) as 'DoanhThuOff'
			from Topping tp, HoaDon hd, CTTopping cttp
			where tp.MaTP = cttp.MaTP and hd.MaHD = cttp.MaHD and year(hd.NgayLap) = @nam
			group by tp.MaTP
		) as TableA on tp.MaTP = TableA.MaTP
		left outer join (
			select tp.MaTP, sum(tp.DonGia * cttpo.SoLuong) as 'DoanhThuOnl'
			from Topping tp, HoaDonOnl hdo, CTToppingOnl cttpo
			where tp.MaTP = cttpo.MaTP and hdo.MaHDOnl = cttpo.MaHDOnl and year(hdo.NgayLap) = @nam and hdo.TinhTrang = 2
			group by tp.MaTP
		) as TableB on tp.MaTP = TableB.MaTP
end
GO

create procedure [dbo].[TKDT_TungThang_CuaNam] (
	@nam int
)
as
begin
	if @nam IS NOT NULL
			WITH months(THANG) AS
			(
				SELECT 1
				UNION ALL
				SELECT THANG+1 
				FROM months
				WHERE THANG < 12
			)
				select m.THANG as 'Thang', hd.[DoanhThuOff], hdo.[DoanhThuOnl]
				from months m
				
				left outer join (select datepart(mm, hd.NgayLap) as 'Thang', sum(hd.TongTien) as 'DoanhThuOff'
				from HoaDon hd
				where year(hd.NgayLap) = @nam 
				group by datepart(mm, hd.NgayLap)) hd
				on m.THANG = hd.Thang
				left outer join (select datepart(mm, hdo.NgayLap) as 'Thang', sum(hdo.TongTien) as 'DoanhThuOnl'
				from HoaDonOnl hdo
				where year(hdo.NgayLap) = @nam and hdo.TinhTrang = 2
				group by datepart(mm, hdo.NgayLap)) hdo
				on m.THANG = hdo.Thang
				;
end
GO