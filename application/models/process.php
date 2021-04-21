<?php  class process extends CI_Model {

    // function add_prod($prod){
    //      $query = "INSERT INTO cart VALUES (?,?,?,?)";
    //      $values = array('',$prod['description'], $prod['price'], $prod['qty']); 
    //      return $this->db->query($query, $values);
    //  }

    //  function count_cart(){
    //     return $this->db->query("SELECT SUM(qty) FROM cart")->row_array();
    //  }
    //  function delete_item($id){
    //     return $this->db->query("DELETE FROM cart WHERE id = ?", array($id));
    //  }
    //  function delete_all(){
    //     return $this->db->query("DELETE FROM cart");
    //  }


    // public function create($post) {
    //     $query = "INSERT INTO customer_info VALUES (?,?,?,?,?,?,?)";
    //     $values = array('',$post['name'], $post['address'], $post['card'],
    //                     $post['total_price'], $post["total_qty"], $post["items"]);
    //     $id = $this->db->insert_id($this->db->query($query, $values));
    //     return $id;
    // }
    // public function find($id) {
    //     return $this->db->query("SELECT * FROM users WHERE id = ?", array($id))->row_array();
    // }
    // public function validate($post) {
    //     $this->load->library('form_validation');
    //     $this->form_validation->set_rules('name', 'First Name', 'trim|required');
    //     $this->form_validation->set_rules('address', 'Last Name', 'trim|required');
    //     $this->form_validation->set_rules('card', 'Card', 'trim|required');
    //     if($this->form_validation->run()) {
    //         return "valid";
    //     }   
    //     else {
    //         return array(validation_errors());
    //     }
    // }

    public function check_email($email){
        return $this->db->query("SELECT COUNT(email) AS email_count  FROM users WHERE email = ?", $email)->row_array();
    }
    public function count_users(){
        return $this->db->query("SELECT COUNT(id) AS users_count  FROM users")->row_array();
    }
    public function create_user($info){
        $query = "INSERT INTO users VALUES (?,?,?,?,?,?,?,?,?)";
        $values = array(
                '', 
                $info['email'], 
                $info['fname'], 
                $info['lname'],
                $info['pword'], 
                '',
                $info["user_level"], 
                date("Y-m-d h:i:sA"), 
                date("Y-m-d h:i:sA")
            );
        return $this->db->query($query, $values);
    }

    public function check_account($info){
        $query = "SELECT * FROM users WHERE email = ?  AND password = ?";
        $values = array($info['email'], $info['pword']);
        $result = $this->db->query($query, $values)->row_array();
        if($result != NULL){
            $this->session->set_userdata('user_info', $this->db->query($query, $values)->row_array());
            return "success";
        }else{
            return "Invalid Username/Password";
        }
    }

    public function get_all_users(){
        return $this->db->query("SELECT * FROM users")->result_array();
    }    

    public function delete_user($id){
        return $this->db->query("DELETE FROM users WHERE id = ?", $id);
    }

    public function get_user_data($id){
        return $this->db->query("SELECT * FROM users WHERE id = ?", $id)->row_array();
    }
    public function update_user($info, $id){
        $query = "UPDATE users SET email = ?, fname = ?, lname = ? WHERE id = ?";
        $values = array(
            $info['email'],
            $info['fname'],
            $info['lname'],
            $id
        );
        return $this->db->query($query, $values);
    }
    public function change_password($pword, $id){
        $query = "UPDATE users SET password = ? WHERE id = ?";
        $values = array(
            $pword,
            $id
        );
        return $this->db->query($query, $values);
    }
    public function update_desc($desc, $id){
        $query = "UPDATE users SET description = ? WHERE id = ?";
        $values = array(
            $desc,
            $id
        );
        return $this->db->query($query, $values);
    }

    public function send_message($message){
        $query = "INSERT INTO messages VALUES (?,?,?,?,?,?,?,?)";
        $values = array(
                '', 
                $message['user_id'], 
                $message['sender_id'], 
                $message['fname'], 
                $message['lname'], 
                $message['message'], 
                date("Y-m-d h:i:sA"), 
                date("Y-m-d h:i:sA")
            );
        return $this->db->query($query, $values);
    }

    public function get_message($id){
        $query = "SELECT * FROM messages WHERE user_id = ?";
        return $this->db->query($query, $id)->result_array();
    }

    public function send_comment($message){
        $query = "INSERT INTO comments VALUES (?,?,?,?,?,?,?,?,?)";
        $values = array(
                '', 
                $message['message_id'],
                $message['user_id'], 
                $message['sender_id'], 
                $message['fname'], 
                $message['lname'], 
                $message['comment'], 
                date("Y-m-d h:i:sA"), 
                date("Y-m-d h:i:sA")
            );
        return $this->db->query($query, $values);
    }

    public function get_comment($id){
        $query = "SELECT * FROM comments WHERE user_id = ?";
        return $this->db->query($query, $id)->result_array();
    }
}	

