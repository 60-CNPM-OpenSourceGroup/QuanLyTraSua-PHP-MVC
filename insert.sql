USE quanlytrasua;

INSERT INTO `loaidouong` (`MaLoaiDU`, `TenLoaiDU`)
VALUES
('DOUONGDACBIET', 'Đồ uống đặc biệt'),
('KEMSUA', 'Kem sữa'),
('KHAC', 'Món khác'),
('TRASUA', 'Trà sữa'),
('TRATRAICAY', 'Trà trái cây');

INSERT INTO `douong` (`MaDU`, `TenDU`, `DonGia`, `HinhAnh`, `NgayThem`, `BanChay`, `MaLoaiDU`) 
VALUES 
('DU0001', 'Trà sữa matcha đậu đỏ', '20000', 'ts_matchadaudo.png', '2020-07-20', '1', 'TRASUA'),
('DU0002', 'Trà sữa truyền thống', '12000', 'ts_truyenthong.png', '2020-07-20', '0', 'TRASUA'),
('DU0003', 'Trà sữa socola', '12000', 'ts_socola.png', '2020-07-20', '0', 'TRASUA'),
('DU0004', 'Trà sữa khoai môn', '15000', 'ts_khoaimon.png', '2020-07-20', '0', 'TRASUA'),
('DU0005', 'Trà sữa trái cây', '12000', 'ts_traicay.png', '2020-07-20', '0', 'TRASUA'),
('DU0006', 'Trà sữa olong', '15000', 'ts_olong.png', '2020-07-20', '1', 'TRASUA'),
('DU0007', 'Trà sữa thái xanh', '12000', 'ts_thaixanh.png', '2020-07-20', '0', 'TRASUA'),
('DU0008', 'Trà sữa hoa lài', '15000', 'ts_hoalai.png', '2020-07-20', '1', 'TRASUA'),
('DU0009', 'Trà sữa matcha', '15000', 'ts_matcha.png', '2020-07-20', '0', 'TRASUA'),
('DU0010', 'Trà thái xanh chanh', '15000', 'ttc_trathaixanhchanh.png', '2020-07-20', '1', 'TRATRAICAY'),
('DU0011', 'Trà sen', '15000', 'ttc_trasen.png', '2020-07-20', '0', 'TRATRAICAY'),
('DU0012', 'Trà ổi hồng', '18000', 'ttc_traoihong.png', '2020-07-20', '1', 'TRATRAICAY'),
('DU0013', 'Hồng trà trái cây', '12000', 'ttc_hongtratraicay.png', '2020-07-20', '1', 'TRATRAICAY'),
('DU0014', 'Trà olong vải', '18000', 'ttc_traolongvai.png', '2020-07-20', '0', 'TRATRAICAY'),
('DU0015', 'Trà đào', '18000', 'ttc_tradao.png', '2020-07-20', '0', 'TRATRAICAY'),
('DU0016', 'Trà xoài', '15000', 'ttc_traxoai.png', '2020-07-20', '0', 'TRATRAICAY'),
('DU0017', 'Yogurt việt quốc', '22000', 'mk_yogurtvietquoc.png', '2020-07-20', '1', 'KHAC'),
('DU0018', 'Yogurt xoài', '22000', 'mk_yogurtxoai.png', '2020-07-20', '1', 'KHAC'),
('DU0019', 'Matcha oreo', '22000', 'mk_matchaoreo.png', '2020-07-20', '0', 'KHAC'),
('DU0020', 'Chocolate oreo', '22000', 'mk_chocolateoreo.png', '2020-07-20', '0', 'KHAC'),
('DU0021', 'Yogurt trân châu dâu', '22000', 'mk_yogurttranchaudau.png', '2020-07-20', '0', 'KHAC'),
('DU0022', 'Sữa tươi trân châu đường đen', '25000', 'mk_suatuoitranchauduongden.jpg', '2020-07-20', '0', 'KHAC'),
('DU0023', 'Milk shake', '15000', 'mk_milkshake.png', '2020-07-20', '1', 'KHAC'),
('DU0024', 'Soda mix', '15000', 'mk_sodamix.png', '2020-07-20', '0', 'KHAC'),
('DU0025', 'Trà olong creama', '22000', 'ks_traolongcreama.png', '2020-07-20', '0', 'KEMSUA'),
('DU0026', 'Trà đen creama', '22000', 'ks_tradencreama.png', '2020-07-20', '1', 'KEMSUA'),
('DU0027', 'Lục trà creama', '22000', 'ks_luctracreama.png', '2020-07-20', '1', 'KEMSUA'),
('DU0028', 'Hồng trà creama', '20000', 'ks_hongtracreama.png', '2020-07-20', '0', 'KEMSUA'),
('DU0029', 'Trà sen creama', '25000', 'ks_trasencreama.png', '2020-07-20', '0', 'KEMSUA'),
('DU0030', 'Chocolate milk shake jelly', '23000', 'dudb_chocolatemilkshakejelly.png', '2020-07-20', '0', 'DOUONGDACBIET'),
('DU0031', 'Hồng trà chanh xí muội QQ', '23000', 'dudb_hongtraxanhximuoiqq.jpg', '2020-07-20', '0', 'DOUONGDACBIET'),
('DU0032', 'Trà sữa lài trứng đậu đỏ', '25000', 'dudb_trasualaitrungdaudo.png', '2020-07-20', '1', 'DOUONGDACBIET'),
('DU0033', 'Lục trà xoài macchiato', '25000', 'dudb_luctraxoaimacchiato.png', '2020-07-20', '0', 'DOUONGDACBIET'),
('DU0034', 'Chocolate oreo đường đen creama', '25000', 'dudb_chocolateoreoduongdencreama.png', '2020-07-20', '1', 'DOUONGDACBIET');

INSERT INTO `loaitopping` (`MaLoaiTP`, `TenLoaiTP`)
VALUES 
('HAT', 'Hạt'),
('KHAC', 'Khác'),
('THACH', 'Thạch'),
('TRANCHAU', 'Trân châu');


INSERT INTO `topping` (`MaTP`, `TenTP`, `DonGia`, `HinhAnh`, `MaLoaiTP`)
VALUES 
('TP0001', 'Trân châu đen', 3000, 'tc_tranchauden.png', 'TRANCHAU'),
('TP0002', 'Kem sữa', 10000, 'k_kemsua.png', 'KHAC'),
('TP0003', 'Hạt sen', 8000, 'k_hatsen.png', 'KHAC'),
('TP0004', 'Đậu đỏ', 8000, 'k_daudo.png', 'KHAC'),
('TP0005', 'Khúc bạch', 5000, 'k_khucbach.png', 'KHAC'),
('TP0006', 'Trái vải', 5000, 'k_traivai.png', 'KHAC'),
('TP0007', 'Đào miếng', 5000, 'k_daomieng.png', 'KHAC'),
('TP0008', 'Pudding', 5000, 'k_pudding.png', 'KHAC'),
('TP0009', 'Hạt thủy tinh', 5000, 'h_hatthuytinh.png', 'HAT'),
('TP0010', 'Trân châu đường đen', 5000, 'tc_tranchauduongden.png', 'TRANCHAU'),
('TP0011', 'Hạt 3Q', 5000, 'h_hat3q.png', 'HAT'),
('TP0012', 'Thạch phô mai', 5000, 't_thachphomai.png', 'THACH'),
('TP0013', 'Thạch trái cây', 5000, 't_thachtraicay.png', 'THACH'),
('TP0014', 'Thạch nha đam', 5000, 't_thachnhadam.png', 'THACH'),
('TP0015', 'Trân châu trắng', 5000, 'tc_tranchautrang.png', 'TRANCHAU');