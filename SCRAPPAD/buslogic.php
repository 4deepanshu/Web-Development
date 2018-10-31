<?php
include 'config.php';
class clstec
{
      public $teccod,$tecnam;
    public function save_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call instec('$this->tecnam')";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }
    }
    
    public function update_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call updtec($this->teccod,'$this->tecnam')";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
            $con->db_close();
            return FALSE;
        }
    }
    
    public function delete_rec()
    {
        $con=  new clscon();
        $link=$con->db_connect();
        $qry="call deltec($this->teccod)";
        $res=  mysqli_query($link, $qry);
        if (mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
            $con->db_close();
            return FALSE;
        }
    }
    
    public function display_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call disptec()";
        $res=  mysqli_query($link, $qry);
        $i=0;
        $arr=array();
        while ($r=  mysqli_fetch_row($res))
        {
            $arr[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $arr;
    }
    
    public function find_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call findtec($this->teccod)";
        $res=  mysqli_query($link, $qry);
        if(mysqli_num_rows($res)>0)
        {
            $r=  mysqli_fetch_row($res);
            $this->teccod=$r[0];
            $this->tecnam=$r[1];
        }
        $con->db_close();
    }
}

class clsreg
{
      public $regcod,$regeml,$regpwd,$regdat;
    public function login($unam,$upwd)
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call logincheck('$unam','$upwd',@cod)";
        $res=  mysqli_query($link, $qry);
        $res1=  mysqli_query($link,"select @cod");
        $r=  mysqli_fetch_row($res1);
        $con->db_close();
        return $r[0];
    } 
    public function save_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call insreg('$this->regeml','$this->regpwd','$this->regdat')";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }
    }
    
    public function update_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call updreg($this->regcod,'$this->regeml','$this->regpwd','$this->regdat')";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
            $con->db_close();
            return FALSE;
        }
    }
    
    public function delete_rec()
    {
        $con=  new clscon();
        $link=$con->db_connect();
        $qry="call delreg($this->regcod)";
        $res=  mysqli_query($link, $qry);
        if (mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
            $con->db_close();
            return FALSE;
        }
    }
    
    public function display_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call dispreg()";
        $res=  mysqli_query($link, $qry);
        $i=0;
        $arr=array();
        while ($r=  mysqli_fetch_row($res))
        {
            $arr[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $arr;
    }
    
    public function find_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call findreg($this->regcod)";
        $res=  mysqli_query($link, $qry);
        if(mysqli_num_rows($res)>0)
        {
            $r=  mysqli_fetch_row($res);
            $this->regcod=$r[0];
            $this->regeml=$r[1];
            $this->regpwd=$r[2];
            $this->regdat=$r[3];
        }
        $con->db_close();
    }
}

class clspst
{
      public $pstcod,$pstdat,$pstregcod,$pstteccod,$psttit,$pstdsc,$pstatt,$pstrat;
    public function save_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call inspst('$this->pstdat',$this->pstregcod,$this->pstteccod,'$this->psttit','$this->pstdsc','$this->pstatt',$this->pstrat)";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }
    }
    
    public function update_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call updpst($this->pstcod,$this->pstrat)";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
            $con->db_close();
            return FALSE;
        }
    }
    
    public function delete_rec()
    {
        $con=  new clscon();
        $link=$con->db_connect();
        $qry="call delpst($this->pstcod)";
        $res=  mysqli_query($link, $qry);
        if (mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
            $con->db_close();
            return FALSE;
        }
    }
    
    public function display_rec($tcod)
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call disppst($tcod)";
        $res=  mysqli_query($link, $qry);
        $i=0;
        $arr=array();
        while ($r=  mysqli_fetch_row($res))
        {
            $arr[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $arr;
    }
    
    public function find_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call findpst($this->pstcod)";
        $res=  mysqli_query($link, $qry);
        if(mysqli_num_rows($res)>0)
        {
            $r=  mysqli_fetch_row($res);
            $this->pstcod=$r[0];
            $this->pstdat=$r[1];
            $this->pstregcod=$r[2];
            $this->pstteccod=$r[3];
            $this->psttit=$r[4];
            $this->pstdsc=$r[5];
            $this->pstatt=$r[6];
            $this->pstrat=$r[7];
        }
        $con->db_close();
    }
}

class clsrep
{
      public $repcod,$repdat,$reppstcod,$repdsc,$repatt,$repregcod;
    public function save_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call insrep('$this->repdat',$this->reppstcod,'$this->repdsc','$this->repatt',$this->repregcod)";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else
        {
            $con->db_close();
            return FALSE;
        }
    }
    
    public function update_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call updrep($this->repcod,'$this->repdat',$this->reppstcod,'$this->repdsc','$this->repatt',$this->repregcod)";
        $res=  mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
            $con->db_close();
            return FALSE;
        }
    }
    
    public function delete_rec()
    {
        $con=  new clscon();
        $link=$con->db_connect();
        $qry="call delrep($this->repcod)";
        $res=  mysqli_query($link, $qry);
        if (mysqli_affected_rows($link)==1)
        {
            $con->db_close();
            return TRUE;
        }
        else 
        {
            $con->db_close();
            return FALSE;
        }
    }
    
    public function display_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call disprep()";
        $res=  mysqli_query($link, $qry);
        $i=0;
        $arr=array();
        while ($r=  mysqli_fetch_row($res))
        {
            $arr[$i]=$r;
            $i++;
        }
        $con->db_close();
        return $arr;
    }
    
    public function find_rec()
    {
        $con=new clscon();
        $link=$con->db_connect();
        $qry="call findrep($this->repcod)";
        $res=  mysqli_query($link, $qry);
        if(mysqli_num_rows($res)>0)
        {
            $r=  mysqli_fetch_row($res);
            $this->repcod=$r[0];
            $this->repdat=$r[1];
            $this->reppstcod=$r[2];
            $this->repdsc=$r[3];
            $this->repatt=$r[4];
            $this->repregcod=$r[5];
        }
        $con->db_close();
    }
}
?>
