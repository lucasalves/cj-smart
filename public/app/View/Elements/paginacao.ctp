    <div class="pagination">
        <ul>

            <?php
            echo $this->Paginator->prev('< ' . __d('cake', 'anterior'), array(), null, array('class' => 'prev disabled', 'tag'=>'li'));
            echo $this->Paginator->numbers(array('separator' => '',));
            echo $this->Paginator->next(__d('cake', 'próxima') . ' >', array(), null, array('class' => 'next disabled', 'tag'=>'li'));
            ?>
        </ul>
    </div>