<?php
class Template {

    private $__content = null;

    public function run($content, $data=[]){
        extract($data);
        if (!empty($content)){
            $this->__content = $content;

            $this->printEntities();

            $this->printRaw();

            $this->ifCondition();

            $this->phpBegin();

            $this->phpEnd();

            $this->forLoop();

            $this->whileLoop();

            $this->foreachLoop();

            eval('?> '.$this->__content.' <?php ');
        }
    }

    public function printEntities(){

        preg_match_all('~{{\s*(.+?)\s*}}~is', $this->__content, $matches);

        if (!empty($matches[1])){
            foreach ($matches[1] as $key=>$item){
                $this->__content = str_replace($matches[0][$key], '<?php echo htmlentities('.$item.'); ?>', $this->__content);
            }
        }
    }

    public function printRaw(){
        preg_match_all('~{!\s*(.+?)\s*!}~is', $this->__content, $matches);

        if (!empty($matches[1])){
            foreach ($matches[1] as $key=>$item){
                $this->__content = str_replace($matches[0][$key], '<?php echo '.$item.'; ?>', $this->__content);
            }
        }
    }

    public function ifCondition(){
        preg_match_all('~@if\s*\((.+?)\s*\)\s*$~im', $this->__content, $matches);
        if (!empty($matches[1])){
            foreach ($matches[1] as $key=>$item){
                $this->__content = str_replace($matches[0][$key], '<?php if ('.$item.'): ?>', $this->__content);
            }
        }

        preg_match_all('~@else\s*$~im', $this->__content, $matches);

        if (!empty($matches[0])){
            foreach ($matches[0] as $key=>$item){
                $this->__content = str_replace($matches[0][$key], '<?php else: ?>', $this->__content);
            }
        }

        preg_match_all('~@endif\s*$~im', $this->__content, $matches);

        if (!empty($matches[0])){
            foreach ($matches[0] as $key=>$item){
                $this->__content = str_replace($matches[0][$key], '<?php endif; ?>', $this->__content);
            }
        }
    }

    public function phpBegin(){
        preg_match_all('~@php~is', $this->__content, $matches);
        if (!empty($matches[0])){
            foreach ($matches[0] as $key=>$item){
                $this->__content = str_replace($matches[0][$key], '<?php ', $this->__content);
            }
        }
    }

    public function phpEnd(){
        preg_match_all('~@endphp~is', $this->__content, $matches);
        if (!empty($matches[0])){
            foreach ($matches[0] as $key=>$item){
                $this->__content = str_replace($matches[0][$key], ' ?>', $this->__content);
            }
        }
    }

    public function forLoop(){
        preg_match_all('~@for\s*\((.+?)\s*\)\s*$~im', $this->__content, $matches);
        if (!empty($matches[1])){
            foreach ($matches[1] as $key=>$item){
                $this->__content = str_replace($matches[0][$key], '<?php for ('.$item.'): ?>', $this->__content);
            }
        }

        preg_match_all('~@endfor\s*$~im', $this->__content, $matches);

        if (!empty($matches[0])){
            foreach ($matches[0] as $key=>$item){
                $this->__content = str_replace($matches[0][$key], '<?php endfor; ?>', $this->__content);
            }
        }
    }

    public function whileLoop(){
        preg_match_all('~@while\s*\((.+?)\s*\)\s*$~im', $this->__content, $matches);
        if (!empty($matches[1])){
            foreach ($matches[1] as $key=>$item){
                $this->__content = str_replace($matches[0][$key], '<?php while ('.$item.'): ?>', $this->__content);
            }
        }

        preg_match_all('~@endwhile\s*$~im', $this->__content, $matches);

        if (!empty($matches[0])){
            foreach ($matches[0] as $key=>$item){
                $this->__content = str_replace($matches[0][$key], '<?php endwhile; ?>', $this->__content);
            }
        }
    }

    public function foreachLoop(){
        preg_match_all('~@foreach\s*\((.+?)\s*\)\s*$~im', $this->__content, $matches);
        if (!empty($matches[1])){
            foreach ($matches[1] as $key=>$item){
                $this->__content = str_replace($matches[0][$key], '<?php foreach ('.$item.'): ?>', $this->__content);
            }
        }

        preg_match_all('~@endforeach\s*$~im', $this->__content, $matches);

        if (!empty($matches[0])){
            foreach ($matches[0] as $key=>$item){
                $this->__content = str_replace($matches[0][$key], '<?php endforeach; ?>', $this->__content);
            }
        }
    }
}