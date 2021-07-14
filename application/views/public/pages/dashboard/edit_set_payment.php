

    <div class="contents bg-light">
        <div class="container mt-4">

            <h3>Edit API Payment Method</h3>
            <hr>
            <h4>Enter your new credentials here:</h4>
            <br>
            <div style="color: red;"><?php echo validation_errors(); ?></div>

            <?php echo form_open(base_url() . 'Dashboard/edit_set_payment/' . $this->session->id); ?>
                <div class="form-group">
                  <label><h5>Client ID:</h5></label>
                  <input type="text" class="form-control" name="id" placeholder="e.g.   AeXgnf5eDZkbrcFlfNZqB4WT7_aTaN4hWmvshjV4XxJt-TncyvJVOnbFlvgTuXKWFvWSor3H3J3G2pv9" required>
                </div>

                <div class="form-group">
                  <label><h5>Secret Key:</h5></label>
                  <input type="text" class="form-control" name="key" placeholder="e.g.   EDN3dHjeG3WZNG5JQAEsPAmpk8zi2lMat_53yaBgKcW-KC-_CtGU8ig5udZJlFEWLXBVMyyVw3uyfgwV" required>
                </div>
                
                <button type="submit" class="btn btn-success">Save Changes</button>
            </form>
        </div>
    </div>
    
</body>
</html>