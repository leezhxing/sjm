<?php

/**
 * һ����ʵ�ʵ�����
 */
class ShopProduct {
    public static function getInstance( $id, PDO $dbh ) {
        $query = "select * from products where id = ?";
        $stmt = $dbh->prepare( $query );
        if ( ! $stmt->execute( array( $id ) ) ) {
            $error=$dbh->errorInfo();
            die( "failed: ".$error[1] );
        }
        $row = $stmt->fetch( );
        if ( empty( $row ) ) { return null; }
        if ( $row['type'] == "book" ) {
            // ��ʼ�� BookProduct
            $product = new BookProduct();       //BookProduct , CdProduct��һ�������ĳ�����,����û����
        } else if ( $row['type'] == "cd" ) {
            $product = new CdProduct();
            // ��ʼ�� CdProduct
        } else {
            // ��ʼ��һ�� ShopProduct ������
        }
        $product->setId( $row['id'] );
        $product->setDiscount( $row['discount'] );
        return $product;
    }
}
