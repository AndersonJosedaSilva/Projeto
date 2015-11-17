<?php
class CadastroService {
    
    public static function listCadastros() {
        $db = ConnectionFactory::getDB();
        $tasks = array();
        
        foreach($db->cadastros() as $cadastro) {
           $cadastros[] = array (
               'id' => $cadastro['id'],
               'name' => $cadastro['name'],
           ); 
        }
        
        return $cadastros;
    }
    
    public static function getById($id) {
        $db = ConnectionFactory::getDB();
        return $db->cadastros[$id];
    }
    
    public static function add($novoCadastro) {
        $db = ConnectionFactory::getDB();
        $cadastro = $db->cadastros->insert($novoCadastro);
        return $cadastro;
    }
    
    public static function update($atualizarCadastro) {
        $db = ConnectionFactory::getDB();
        $cadastro = $db->tasks[$atualizarCadastro['id']];
        
        if($cadastro) {
            $cadastro['nome'] = $atualizarCadastro['name'];
            return true;
        }
        
        return false;
    }
    
    public static function delete($id) {
        $db = ConnectionFactory::getDB();
        $cadastro = $db->cadastros[$id];
        if($cadastro) {
            $cadastro->delete();
            return true;
        }
        return false;
    }
}
?>