<?php
/**
 * 常用排序类
 * @author dj
 */
namespace sort;

class Sort{
    /**
     * 插入排序
     */
    public static function insertSort($params = array())
    {
        $i = $j = $l = 0;
        $r = count($params) - 1;

        for ($i = $l + 1; $i <= $r; $i++) {
            for ($j = $i; $j > $l; $j--) {
                if ($params[$j - 1] > $params[$j]) {
                    $temp = $params[$j - 1];
                    $params[$j - 1] = $params[$j];
                    $params[$j] = $temp;
                }
            }
        }

        return $params;
    }

    /**
     * 插入排序升级
     */
    public static function insertSortUp($params = array())
    {
        $l = 0;
        $r = count($params) - 1;

        for ($i = $r; $i > $l; $i--) {
            if ($params[$i - 1] > $params[$i]) {
                $temp = $params[$i - 1];
                $params[$i - 1] = $params[$i];
                $params[$i] = $temp;
            }
        }

        for ($i = $l + 2; $i <= $r; $i++) {
            $j = $i;
            $v = $params[$i];
            // 前面一轮已经有序，将新增元素对比有序数组，找到合适位置以替换
            while ($v < $params[$j - 1]) {
                $params[$j] = $params[$j - 1];
                $j--;
            }
            $params[$j] = $v;
        }

        return $params;
    }

    /**
     * 选择排序
     */
    public static function selectSort($params = array())
    {
        $l = 0;
        $r = count($params) - 1;

        for ($i = $l; $i <= $r; $i++) {
            $min = $i;
            //每次取循环体内最小值，赋值给$params[$i];
            for ($j = $i + 1; $j <= $r; $j++) {
                if ($params[$j] < $params[$min]) {
                    $min = $j;
                }
            }
            $temp = $params[$i];
            $params[$i] = $params[$min];
            $params[$min] = $temp;
        }

        return $params;
    }

    /**
     * 冒泡排序
     */
    public static function bubbleSort($params = array())
    {
        $l = 0;
        $r = count($params) - 1;

        //依次沉底
        for ($i = $l; $i < $r; $i++) {
            for ($j = $r; $j > $i; $j--) {
                if ($params[$j] < $params[$j - 1]) {
                    $temp = $params[$j];
                    $params[$j] = $params[$j - 1];
                    $params[$j - 1] = $temp;
                }
            }
        }

        return $params;
    }

    /**
     * 冒泡排序升级，避免每次转换
     */
    public static function bubbleSort1($params = array())
    {
        $l = 0;
        $r = count($params) - 1;

        for ($i = $r; $i >= 0; $i--) {
            $k = 0;
            //拿当前范围内最大值，赋值给$params[$i];
            for ($j = 0; $j <= $i; $j++) {
                if ($params[$j] > $params[$k]) {
                    $k = $j;
                }
            }
            $temp = $params[$k];
            $params[$k] = $params[$i];
            $params[$i] = $temp;
        }

        return $params;
    }

    /**
     * 希尔排序
     * grap = $r/2 .. grap = grap/2。步长是grap，且分成grap组，再对每组，组内进行插入排序。依次反复
     */
    public static function shellSort($params = array())
    {
        $l = $h = 0;
        $r = count($params) - 1;

        for ($gap = floor(count($params) / 2); $gap > 0; $gap = floor($gap / 2)) {
            var_dump($gap);
            for ($i = 0; $i < $gap; $i++) {
                for ($j = $i + $gap; $j <= $r; $j += $gap) {
                    if ($params[$j] < $params[$j - $gap]) {
                        $temp = $params[$j];
                        $k = $j - $gap;
                        while ($k >= 0 && $params[$k] > $temp) {
                            $params[$k + $gap] = $params[$k];
                            $k -= $gap;
                        }
                        $params[$k + $gap] = $temp;
                    }
                }
                var_dump($params);
            }
        }

        return $params;
    }

    /**
     * 快速排序 - 递归，按大于或小余基准值归类
     */
    function quickSort($params = array())
    {
        $r = count($params);
        if ($r <= 1) {
            return $params;
        }

        $v = $params[0];
        $low = $up = array();
        for ($i = 1; $i < $r; ++$i) {
            if ($params[$i] > $v) {
                $up[] = $params[$i];
            } else {
                $low[] = $params[$i];
            }
        }
        $low = $this->quickSort($low);
        $up = $this->quickSort($up);

        return array_merge($low, array($v), $up);
    }
}
?>