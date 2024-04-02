<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tem Dán</title>
    <style>
        @media print {
            .tem {
                width: 40mm;
                height: 30mm;
                padding: 2mm;
                border: 2px solid black;
                /* Thêm border */
                margin-bottom: 1mm;
                overflow: hidden;
                /* Ẩn nội dung vượt quá kích thước */
            }

            .tem-content {
                font-size: 8pt;
                height: 100%;
                /* Đảm bảo phần tử con sẽ lấp đầy toàn bộ không gian của phần tử cha */
                display: flex;
                /* Sử dụng flexbox để căn chỉnh nội dung */
                flex-direction: column;
                /* Dàn nội dung theo hướng dọc */
                justify-content: space-between;
                /* Canh giữa các phần tử theo chiều dọc */
            }

            .company-name {
                font-weight: bold;
                font-size: 10pt;
                /* Kích thước chữ lớn hơn */
                margin: 0;
                /* Loại bỏ margin */
            }

            .company-des {
                font-size: 8pt;
                /* Kích thước chữ lớn hơn */
                margin: 0;
                /* Loại bỏ margin */
            }


            .item-name {
                font-weight: bold;
                margin: 0;
                /* Loại bỏ margin */
            }
        }
    </style>
</head>

<body onload="window.print()">

    <tbody>
        <tr>
            <td colspan='16'>
                <?php
                $q1 = $this->db->query("select * from db_company where id=1 and status=1");
                $res1 = $q1->row();
                $company_name = $res1->company_name;

                $i = 1;

                $this->db->select("a.sales_qty,
                                 a.tax_type,
                                 a.price_per_unit,
                                 a.tax_amt,
                                 a.discount_input,
                                 a.discount_type,
                                 a.discount_amt, 
                                 a.unit_total_cost,
                                 a.total_cost,
                                 b.tax,
                                 b.tax_name,
                                 c.item_name,
                                 a.description,
                                 c.hsn
                                 ");
                $this->db->from("db_salesitems a");
                $this->db->where("a.sales_id", $sales_id);
                $this->db->join("db_tax b", "b.id=a.tax_id", "left");
                $this->db->join("db_items c", "c.id=a.item_id", "left");

                $q2 = $this->db->get();

                foreach ($q2->result() as $res2) {
                    $sales_qty = $res2->sales_qty;
                    for ($i = 0; $i < $sales_qty; $i++) {
                        ?>
                        <div class="tem">
                            <div class="tem-content">

                                <p class="item-name">
                                    <?php echo $res2->item_name; ?>
                                </p>
                                <p class="item-des">
                                    <?php echo $res2->description; ?>
                                </p>
                                <p>
                                    <?php echo "Giá: " . number_format(($res2->price_per_unit), 0) . "đ"; ?>
                                </p>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </td>
        </tr>
    </tbody>

</body>
<script>
    // Sau khi trang được in
    window.onafterprint = function () {
        window.close();
    };

    // Sau khi trang được load, in hóa đơn

</script>


</html>