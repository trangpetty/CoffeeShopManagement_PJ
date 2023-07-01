-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 30, 2023 lúc 04:09 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlbh_cf`
--

DELIMITER $$
--
-- Thủ tục
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_chitiethoadon` (IN `inMAHD` INT, IN `inMASP` CHAR(10), IN `inSOLUONG` INT, IN `inDONGIA` FLOAT)   BEGIN
   if EXISTS(SELECT MAHD,MASP FROM chitiethoadon_banhang where MAHD = inMAHD and MASP = inMASP) then
	update chitiethoadon_banhang set DONGIA = DONGIA + inDONGIA, SOLUONG = SOLUONG + inSOLUONG where MAHD = inMAHD and MASP = inMASP;
   else 
	insert into chitiethoadon_banhang values
	(inMAHD,inMASP,inSOLUONG,inDONGIA);
   end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_checkKhuyenMai` (`p_MAKM` CHAR(5))   begin
	declare v_DateNow date default convert(now(3), date);
	if not exists(select MAKM from KHUYENMAI where KHUYENMAI.MAKM = p_MAKM and v_DateNow between KHUYENMAI.TGAPDUNG and KHUYENMAI.TGKETTHUC) 
		and exists(select MAKM from KHUYENMAI where KHUYENMAI.MAKM = p_MAKM)
		then
		delete from KHUYENMAI where KHUYENMAI.MAKM = p_MAKM;
		ROLLBACK;
		end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_crud_ban` (`p_MABAN` CHAR(5), `p_KHUVUC` CHAR(1), `p_PHUTHU` DOUBLE, `p_TRANGTHAI` BIT, `p_StatementType` NVARCHAR(20))   begin
	if p_StatementType = 'Insert'
		then
		-- SQLINES LICENSE FOR EVALUATION USE ONLY
		insert into BAN values
		(
		p_MABAN,
		p_KHUVUC,
		p_PHUTHU,
        p_TRANGTHAI
		);
	elseif p_StatementType = 'Update'
		then
		update BAN
		set
		KHUVUC = p_KHUVUC,
		PHUTHU = p_PHUTHU,
                    TRANGTHAI = p_TRANGTHAI
		where MABAN = p_MABAN;
	elseif p_StatementType = 'Select'
		then
		-- SQLINES LICENSE FOR EVALUATION USE ONLY
		select * from BAN where MABAN = p_MABAN;
	elseif p_StatementType = 'Delete'
		then 
		update HOADONBANHANG  set HOADONBANHANG.MABAN = null where HOADONBANHANG.MABAN = p_MABAN;
		delete from BAN where MABAN = p_MABAN;
	else 
		rollback;
	end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_crud_HoaDonBanHang` (IN `p_MAHD` CHAR(5), IN `p_MANV` CHAR(10), IN `p_SOTHE` CHAR(10), IN `p_NGAYLAPHD` DATE, IN `p_GIOLAPHD` TIME(6), IN `p_GIAMGIA` DOUBLE, IN `p_MAKM` CHAR(5), IN `p_MABAN` CHAR(5), IN `p_chuthich` INT(30), IN `p_StatementType` INT(20))   begin if not exists(select MAHD from HOADONBANHANG where MAHD = p_MAHD ) then rollback; else if p_StatementType = 'Insert' then -- SQLINES LICENSE FOR EVALUATION USE ONLY
insert into HOADONBANHANG values ( p_MANV ,

p_SOTHE , p_GIAMGIA , p_MAKM, p_MABAN, p_chuthich ); elseif p_StatementType = 'Update' then Update HOADONBANHANG set NGAYLAPHD = p_NGAYLAPHD, GIOLAPHD = p_GIOLAPHD, GIAMGIA = p_GIAMGIA, chuthich = p_chuthich where MAHD = p_MAHD; elseif p_StatementType = 'Select' then -- SQLINES LICENSE FOR EVALUATION USE ONLY 
select * from HOADONBANHANG where MAHD = p_MAHD; elseif p_StatementType = 'Delete' then delete from CHITIEITHOADON_BANHANG where MAHD = p_MAHD; delete from HOADONBANHANG where MAHD = p_MAHD; else rollback; end if; end if; end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_crud_HoiVien` (`p_SOTHE` CHAR(10), `p_TENHV` NVARCHAR(25), `p_NGAYSINH` DATE, `p_DIACHI` NVARCHAR(40), `p_DIENTHOAI` CHAR(14), `p_SOCCCD` CHAR(12), `p_DIEMTL` INT, `p_LOAIHV` CHAR(5), `p_StatementType` NVARCHAR(20))   begin
	if p_StatementType = 'Insert'
		then
		-- SQLINES LICENSE FOR EVALUATION USE ONLY
		insert into HOIVIEN values
		(
		p_SOTHE,
		p_TENHV,
		p_NGAYSINH,
		p_DIACHI,
		p_DIENTHOAI,
		p_SOCCCD,
		p_DIEMTL,
		p_LOAIHV
		);
	elseif p_StatementType = 'Update'
		then
		update HOIVIEN
		set
		TENHV = p_TENHV,
		NGAYSINH = p_NGAYSINH,
		DIACHI = p_DIACHI,
		DIENTHOAI = p_DIENTHOAI,
		SOCCCD = p_SOCCCD,
		DIEMTL = p_DIEMTL,
		LOAIHV = p_LOAIHV
		where SOTHE = p_SOTHE;
	elseif p_StatementType = 'select'
		then
		-- SQLINES LICENSE FOR EVALUATION USE ONLY
		select * from HOIVIEN where SOTHE = p_SOTHE;
	elseif p_StatementType = 'Delete'
		then
		update HOADONBANHANG  set HOADONBANHANG.SOTHE = null where HOADONBANHANG.SOTHE = p_SOTHE;
		delete from HOIVIEN where SOTHE = p_SOTHE;
	end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_crud_KhuyenMai` (`p_MAKM` CHAR(5), `p_TENKM` NVARCHAR(30), `p_TGAPDUNG` DATE, `p_TGKETTHUC` DATE, `p_GIATRI` DOUBLE, `p_StatementType` NVARCHAR(20))   begin
	if p_StatementType = 'Insert'
		then
		-- SQLINES LICENSE FOR EVALUATION USE ONLY
		insert into KHUYENMAI values
		(
		p_MAKM,
		p_TENKM ,
		p_TGAPDUNG ,
		p_TGKETTHUC,
		p_GIATRI 
		);
	elseif p_StatementType = 'Update'
		then
		update KHUYENMAI
		set
		TENKM = p_TENKM ,
		TGAPDUNG = p_TGAPDUNG ,
		TGKETTHUC = p_TGKETTHUC,
		GIATRI = p_GIATRI
		where MAKM = p_MAKM;
	elseif p_StatementType = 'Select'
		then
		-- SQLINES LICENSE FOR EVALUATION USE ONLY
		select * from KHUYENMAI where MAKM = p_MAKM;
	elseif p_StatementType = 'Delete'
		then
		update HOADONBANHANG  set HOADONBANHANG.MAKM = null where HOADONBANHANG.MAKM = p_MAKM;
		delete from KHUYENMAI where MAKM = p_MAKM;
	
	end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_crud_NhanVien` (`p_MANV` CHAR(10), `p_HONV` NVARCHAR(25), `p_TENNV` NVARCHAR(12), `p_GIOITINH` TINYINT, `p_NGAYSINH` DATE, `p_NOISINH` NVARCHAR(15), `p_DIACHI` NVARCHAR(40), `p_DIENTHOAI` NVARCHAR(14), `p_NGAYBDDILAM` DATE, `p_SOCCCD` NVARCHAR(12), `p_CHUCVU` CHAR(10), `p_LUONGCA` DOUBLE, `p_StatementType` NVARCHAR(20))   begin
	if p_StatementType = 'Insert'
		then
		-- SQLINES LICENSE FOR EVALUATION USE ONLY
		insert into NHANVIEN values(
		p_MANV,
		p_HONV,
		p_TENNV,
		p_GIOITINH,
		p_NGAYSINH,
		p_NOISINH,
		p_DIACHI, 
		p_DIENTHOAI,
		p_NGAYBDDILAM,
		p_SOCCCD,
		p_CHUCVU,
		p_LUONGCA);
	elseif p_StatementType = 'Select'
		then
		-- SQLINES LICENSE FOR EVALUATION USE ONLY
		select * from NHANVIEN where NHANVIEN.MANV = p_MANV;
	elseif p_StatementType = 'Update'
		then 
		update NHANVIEN
		set
		HONV = p_HONV,
		TENNV = p_TENNV,
		GIOITINH = p_GIOITINH,
		NGAYSINH = p_NGAYSINH,
		NOISINH = p_NOISINH,
		DIACHI = p_DIACHI,
		DIENTHOAI = p_DIENTHOAI,
		NGAYBDDILAM = p_NGAYBDDILAM,
		SOCCCD = p_SOCCCD,
		CHUCVU = p_CHUCVU,
		LUONGCA = p_LUONGCA
		where MANV = p_MANV;
	elseif p_StatementType = 'Delete'
		then  
		delete from SOCHAMCONG where SOCHAMCONG.MANV = p_MANV;
		update HOADONBANHANG  set HOADONBANHANG.MANV = null where HOADONBANHANG.MANV = p_MANV;
		delete  from NHANVIEN where NHANVIEN.MANV = p_MANV; 
	end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_crud_SanPham` (IN `p_MASP` CHAR(10), IN `p_TENSP` VARCHAR(40), IN `p_GIA` DOUBLE, IN `p_SIZE` CHAR(1), IN `p_NHOMLOAI` VARCHAR(25), IN `p_StatementType` VARCHAR(20))   begin
	if p_StatementType = 'Insert'
		then
		-- SQLINES LICENSE FOR EVALUATION USE ONLY
		insert into SANPHAM values
		(
		p_MASP,
		p_TENSP,
		p_GIA,
		p_SIZE,
		p_NHOMLOAI
		);
	elseif p_StatementType = 'Update'
		then
		update SANPHAM
		set
		TENSP = p_TENSP,
		GIA =  p_GIA,
		SIZE = p_SIZE,
		NHOMLOAI = p_NHOMLOAI
		where MASP = p_MASP;
	elseif p_StatementType = 'Select'
		then
		-- SQLINES LICENSE FOR EVALUATION USE ONLY
		select 8 from SANPHAM where MASP = p_MASP;
	elseif p_StatementType = 'Delete'
		then
		update chitiethoadon_banhang set MASP = null where chitiethoadon_banhang.MASP = p_MASP;
		delete from SANPHAM where MASP = p_MASP;
	
	end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_crud_SoChamCong` (IN `p_MANV` CHAR(10), IN `p_NGAYDILAM` DATE, IN `p_CALAM` CHAR(1), IN `p_StatementType` INT(20))   begin
	 if Exists(select MANV from NHANVIEN where MANV = p_MANV)
		then
	
			if p_StatementType ='Insert'
				then
                if not EXISTS (select * from sochamcong WHERE MANV=p_MANV AND NGAYDILAM=p_NGAYDILAM AND CALAM=p_CALAM)
				-- SQLINES LICENSE FOR EVALUATION USE ONL
               	then
				insert into SOCHAMCONG values
				(p_MANV,p_NGAYDILAM,p_CALAM);
                else ROLLBACK;
                end if;
			elseif p_StatementType = 'Update'
				then
				update SOCHAMCONG
				set
				NGAYDILAM = p_NGAYDILAM,
				CALAM = p_CALAM
				where manv = p_MANV and NGAYDILAM = p_NGAYDILAM and CALAM=p_CALAM;
			elseif p_StatementType = 'Select'
				then
				-- SQLINES LICENSE FOR EVALUATION USE ONLY
				select * from SOCHAMCONG where MANV =p_MANV;
			elseif p_StatementType = 'Delete'
				then
				delete from SOCHAMCONG where manv = p_MANV and NGAYDILAM = p_NGAYDILAM and CALAM=p_CALAM;
			
			end if;
		end if;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`username`, `password`, `role`) VALUES
('admin', '000000', b'1'),
('nv01', '000000', b'0'),
('nv02', '000000', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ban`
--

CREATE TABLE `ban` (
  `MABAN` char(5) NOT NULL,
  `KHUVUC` char(1) NOT NULL CHECK (`KHUVUC` = 'A' or `KHUVUC` = 'B' or `KHUVUC` = 'C'),
  `PHUTHU` float NOT NULL CHECK (`PHUTHU` >= 0),
  `TRANGTHAI` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ban`
--

INSERT INTO `ban` (`MABAN`, `KHUVUC`, `PHUTHU`, `TRANGTHAI`) VALUES
('B00', 'B', 0, b'0'),
('B02', 'B', 5000, b'1'),
('B03', 'A', 10000, b'0'),
('B04', 'A', 10000, b'0'),
('B05', 'A', 10000, b'0');

--
-- Bẫy `ban`
--
DELIMITER $$
CREATE TRIGGER `tg_bf_dl_ban` BEFORE DELETE ON `ban` FOR EACH ROW begin
	update hoadonbanhang set hoadonbanhang.MABAN = null where hoadonbanhang.MABAN = old.MABAN;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon_banhang`
--

CREATE TABLE `chitiethoadon_banhang` (
  `MAHD` int(11) DEFAULT NULL,
  `MASP` char(10) DEFAULT NULL,
  `SOLUONG` int(11) NOT NULL CHECK (`SOLUONG` > 0),
  `DONGIA` float NOT NULL CHECK (`DONGIA` > 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon_banhang`
--

INSERT INTO `chitiethoadon_banhang` (`MAHD`, `MASP`, `SOLUONG`, `DONGIA`) VALUES
(38, 'SP10', 1, 35000),
(38, 'SP07', 2, 60000),
(38, 'SP16', 1, 20000),
(38, 'SP15', 2, 60000),
(39, 'SP10', 3, 105000),
(39, 'SP07', 1, 30000),
(39, 'SP16', 2, 40000),
(39, 'SP14', 1, 25000),
(40, 'SP10', 1, 35000),
(40, 'SP07', 1, 30000),
(40, 'SP16', 1, 20000),
(40, 'SP14', 1, 25000),
(41, 'SP16', 1, 20000),
(41, 'SP16', 2, 40000),
(46, 'SP15', 1, 30000),
(46, 'SP07', 10, 10),
(46, 'SP04', 7, 140000),
(46, 'SP15', 1, 1),
(46, 'SP04', 2, 2),
(48, 'SP01', 1, 25000),
(38, 'SP10', 1, 35000),
(38, 'SP07', 2, 60000),
(38, 'SP16', 1, 20000),
(38, 'SP15', 2, 60000),
(39, 'SP10', 3, 105000),
(39, 'SP07', 1, 30000),
(39, 'SP16', 2, 40000),
(39, 'SP14', 1, 25000),
(40, 'SP10', 1, 35000),
(40, 'SP07', 1, 30000),
(40, 'SP16', 1, 20000),
(40, 'SP14', 1, 25000),
(41, 'SP16', 1, 20000),
(41, 'SP16', 2, 40000),
(46, 'SP15', 1, 30000),
(46, 'SP07', 10, 10),
(46, 'SP04', 7, 140000),
(46, 'SP15', 1, 1),
(46, 'SP04', 2, 2),
(48, 'SP01', 1, 25000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonbanhang`
--

CREATE TABLE `hoadonbanhang` (
  `MAHD` int(11) NOT NULL,
  `MANV` char(10) DEFAULT NULL,
  `SOTHE` char(10) DEFAULT NULL,
  `NGAYLAPHD` date DEFAULT curdate(),
  `GIOLAPHD` time DEFAULT curtime(),
  `GIAMGIA` float DEFAULT NULL CHECK (`GIAMGIA` >= 0),
  `MAKM` char(5) DEFAULT NULL,
  `MABAN` char(5) DEFAULT NULL,
  `chuthich` varchar(30) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoadonbanhang`
--

INSERT INTO `hoadonbanhang` (`MAHD`, `MANV`, `SOTHE`, `NGAYLAPHD`, `GIOLAPHD`, `GIAMGIA`, `MAKM`, `MABAN`, `chuthich`) VALUES
(38, 'NV01', 'HV00', '2022-12-24', '19:06:01', 0, 'KM00', 'B00', ''),
(39, 'NV02', 'HV01', '2022-12-24', '19:06:30', 20, 'KM02', 'B00', ''),
(40, 'NV01', 'HV01', '2022-12-24', '19:07:10', 20, 'KM01', 'B02', 'hello'),
(41, 'NV01', 'HV00', '2022-12-24', '19:10:07', 0, 'KM00', 'B00', 'hi'),
(42, NULL, 'HV00', '2023-01-04', '18:35:32', 0, 'KM00', 'B00', ''),
(46, 'NV01', 'HV02', '2023-02-11', '11:36:09', 10, 'KM00', 'B00', ''),
(48, 'NV02', 'HV01', '2023-02-11', '15:28:10', 5, 'KM00', 'B00', '');

--
-- Bẫy `hoadonbanhang`
--
DELIMITER $$
CREATE TRIGGER `tg_af_is_hoadonbanhang` AFTER INSERT ON `hoadonbanhang` FOR EACH ROW begin
	if exists(select SOTHE from hoivien where SOTHE=new.SOTHE) then
    update hoivien set DIEMTL = DIEMTL + 1 where SOTHE = new.SOTHE;
    end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tg_bf_dl_hoadonbanhang` BEFORE DELETE ON `hoadonbanhang` FOR EACH ROW begin
	delete from chitiethoadon_banhang where chitiethoadon_banhang.MAHD = old.MAHD;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoivien`
--

CREATE TABLE `hoivien` (
  `SOTHE` char(10) NOT NULL,
  `TENHV` varchar(25) CHARACTER SET utf8 NOT NULL,
  `NGAYSINH` date NOT NULL,
  `DIACHI` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `DIENTHOAI` char(14) DEFAULT NULL,
  `SOCCCD` char(12) DEFAULT NULL,
  `DIEMTL` int(11) DEFAULT 0 CHECK (`DIEMTL` >= 0),
  `LOAIHV` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoivien`
--

INSERT INTO `hoivien` (`SOTHE`, `TENHV`, `NGAYSINH`, `DIACHI`, `DIENTHOAI`, `SOCCCD`, `DIEMTL`, `LOAIHV`) VALUES
('HV00', '', '0000-00-00', '', '', '', 2, 'Chon'),
('HV01', 'Le Thi Thuy Trang', '2001-07-22', 'Ha Noi', '0358080953', '033301005121', 7, 'VIP1'),
('HV02', 'Le Khanh Linh', '2010-07-05', 'Hung Yen', '0985319502', '', 11, 'VIP2');

--
-- Bẫy `hoivien`
--
DELIMITER $$
CREATE TRIGGER `tg_bf_dl_hoivien` BEFORE DELETE ON `hoivien` FOR EACH ROW begin
	update hoadonbanhang set SOTHE = null where hoadonbanhang.SOTHE = old.SOTHE;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `MAKM` char(5) NOT NULL,
  `TENKM` varchar(30) CHARACTER SET utf8 NOT NULL,
  `TGAPDUNG` date NOT NULL,
  `TGKETTHUC` date NOT NULL,
  `GIATRI` float NOT NULL CHECK (`GIATRI` >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`MAKM`, `TENKM`, `TGAPDUNG`, `TGKETTHUC`, `GIATRI`) VALUES
('KM00', 'KHONG CO', '2022-12-01', '2022-12-31', 0),
('KM01', 'Flash Sale', '2022-12-15', '2022-12-23', 5),
('KM02', 'Sale', '2022-12-23', '2022-12-30', 15);

--
-- Bẫy `khuyenmai`
--
DELIMITER $$
CREATE TRIGGER `tg_bf_dl_khuyenmai` BEFORE DELETE ON `khuyenmai` FOR EACH ROW begin
	update hoadonbanhang set hoadonbanhang.MAKM = null where hoadonbanhang.MAKM = old.MAKM;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MANV` char(10) NOT NULL,
  `HONV` varchar(25) CHARACTER SET utf8 NOT NULL,
  `TENNV` varchar(12) CHARACTER SET utf8 NOT NULL,
  `GIOITINH` bit(1) NOT NULL,
  `NGAYSINH` date NOT NULL,
  `NOISINH` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `DIACHI` varchar(40) CHARACTER SET utf8 NOT NULL,
  `DIENTHOAI` varchar(14) CHARACTER SET utf8 DEFAULT NULL,
  `NGAYBDDILAM` date DEFAULT NULL,
  `SOCCCD` varchar(12) CHARACTER SET utf8 DEFAULT NULL,
  `CHUCVU` char(10) DEFAULT NULL,
  `LUONGCA` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MANV`, `HONV`, `TENNV`, `GIOITINH`, `NGAYSINH`, `NOISINH`, `DIACHI`, `DIENTHOAI`, `NGAYBDDILAM`, `SOCCCD`, `CHUCVU`, `LUONGCA`) VALUES
('NV01', 'Le', 'Thi Thuy', b'1', '2001-07-22', 'Hung Yen', 'Ha Noi', '0358080953', '2022-12-01', '033301005121', 'Boi ban', 25000),
('NV02', 'Le', 'Khanh linh', b'0', '2010-07-05', 'Hung Yen', '', '', '0000-00-00', '', 'Thu ngan', 20000);

--
-- Bẫy `nhanvien`
--
DELIMITER $$
CREATE TRIGGER `tg_bf_dl_nhanvien` BEFORE DELETE ON `nhanvien` FOR EACH ROW begin
     delete from sochamcong where sochamcong.manv = old.MANV;
     update hoadonbanhang set hoadonbanhang.MANV = null where hoadonbanhang.MANV = old.MANV;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MASP` char(10) NOT NULL,
  `TENSP` varchar(40) CHARACTER SET utf8 NOT NULL,
  `GIA` float DEFAULT NULL CHECK (`GIA` > 0),
  `SIZE` char(1) NOT NULL CHECK (`SIZE` = 'S' or `SIZE` = 'M' or `SIZE` = 'L'),
  `NHOMLOAI` varchar(25) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MASP`, `TENSP`, `GIA`, `SIZE`, `NHOMLOAI`) VALUES
('SP01', 'Coffee', 150000, 'S', 'Coffee'),
('SP02', 'Espresso', 30000, 'M', 'Coffee'),
('SP03', 'Espresso', 35000, 'L', 'Coffee'),
('SP04', 'Latte', 20000, 'S', 'Coffee'),
('SP05', 'Latte', 25000, 'M', 'Coffee'),
('SP06', 'Latte', 30000, 'L', 'Coffee'),
('SP07', 'Cappuccino', 30000, 'S', 'Coffee'),
('SP08', 'Cappuccino', 35000, 'M', 'Coffee'),
('SP09', 'Cappuccino', 40000, 'L', 'Coffee'),
('SP10', 'Macchiato', 35000, 'S', 'Coffee'),
('SP11', 'Macchiato', 40000, 'M', 'Coffee'),
('SP12', 'Macchiato', 45000, 'L', 'Coffee'),
('SP13', 'Oolong Tea', 20000, 'S', 'Tea'),
('SP14', 'Oolong Tea', 25000, 'M', 'Tea'),
('SP15', 'Oolong Tea', 30000, 'L', 'Tea'),
('SP16', 'Red Tea', 20000, 'S', 'Tea'),
('SP17', 'Red Tea', 25000, 'M', 'Tea'),
('SP18', 'Red Tea', 30000, 'L', 'Tea');

--
-- Bẫy `sanpham`
--
DELIMITER $$
CREATE TRIGGER `tg_bf_dl_sanpham` BEFORE DELETE ON `sanpham` FOR EACH ROW begin
	update chitiethoadon_banhang set chitiethoadon_banhang.MASP = null where chitiethoadon_banhang.MASP = old.MASP;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sochamcong`
--

CREATE TABLE `sochamcong` (
  `MANV` char(10) NOT NULL,
  `NGAYDILAM` date NOT NULL,
  `CALAM` char(1) NOT NULL CHECK (`CALAM` = 'S' or `CALAM` = 'C' or `CALAM` = 'T')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sochamcong`
--

INSERT INTO `sochamcong` (`MANV`, `NGAYDILAM`, `CALAM`) VALUES
('NV01', '2023-04-19', 'C'),
('NV01', '2023-04-20', 'S'),
('NV01', '2023-04-24', 'T'),
('NV01', '2023-06-20', 'S'),
('NV02', '2023-04-20', 'C'),
('NV02', '2023-04-20', 'S');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `ban`
--
ALTER TABLE `ban`
  ADD PRIMARY KEY (`MABAN`);

--
-- Chỉ mục cho bảng `chitiethoadon_banhang`
--
ALTER TABLE `chitiethoadon_banhang`
  ADD KEY `MAHD` (`MAHD`),
  ADD KEY `MASP` (`MASP`);

--
-- Chỉ mục cho bảng `hoadonbanhang`
--
ALTER TABLE `hoadonbanhang`
  ADD PRIMARY KEY (`MAHD`),
  ADD KEY `MANV` (`MANV`),
  ADD KEY `SOTHE` (`SOTHE`),
  ADD KEY `MAKM` (`MAKM`),
  ADD KEY `MABAN` (`MABAN`);

--
-- Chỉ mục cho bảng `hoivien`
--
ALTER TABLE `hoivien`
  ADD PRIMARY KEY (`SOTHE`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`MAKM`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MANV`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MASP`);

--
-- Chỉ mục cho bảng `sochamcong`
--
ALTER TABLE `sochamcong`
  ADD PRIMARY KEY (`MANV`,`NGAYDILAM`,`CALAM`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hoadonbanhang`
--
ALTER TABLE `hoadonbanhang`
  MODIFY `MAHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon_banhang`
--
ALTER TABLE `chitiethoadon_banhang`
  ADD CONSTRAINT `chitiethoadon_banhang_ibfk_1` FOREIGN KEY (`MAHD`) REFERENCES `hoadonbanhang` (`MAHD`),
  ADD CONSTRAINT `chitiethoadon_banhang_ibfk_2` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`);

--
-- Các ràng buộc cho bảng `hoadonbanhang`
--
ALTER TABLE `hoadonbanhang`
  ADD CONSTRAINT `hoadonbanhang_ibfk_1` FOREIGN KEY (`MANV`) REFERENCES `nhanvien` (`MANV`),
  ADD CONSTRAINT `hoadonbanhang_ibfk_2` FOREIGN KEY (`SOTHE`) REFERENCES `hoivien` (`SOTHE`),
  ADD CONSTRAINT `hoadonbanhang_ibfk_3` FOREIGN KEY (`MAKM`) REFERENCES `khuyenmai` (`MAKM`),
  ADD CONSTRAINT `hoadonbanhang_ibfk_4` FOREIGN KEY (`MABAN`) REFERENCES `ban` (`MABAN`);

--
-- Các ràng buộc cho bảng `sochamcong`
--
ALTER TABLE `sochamcong`
  ADD CONSTRAINT `sochamcong_ibfk_1` FOREIGN KEY (`MANV`) REFERENCES `nhanvien` (`MANV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
