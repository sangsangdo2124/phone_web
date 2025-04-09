<!-- Quick View Modal -->
<div id="quick-view-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="quick-view-content">
            <!-- Nội dung Quick View sẽ được tải ở đây -->
        </div>
    </div>
</div>

<style>
 .modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow-y: auto;
    background: rgba(0, 0, 0, 0.6);
}

.modal-content {
    background: #fff;
    margin: 5% auto;
    padding: 30px;
    width: 80%;
    max-width: 900px;
    border-radius: 10px;
    position: relative;
    display: flex;
    gap: 30px;
    flex-wrap: wrap;
}

.modal-content img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    object-fit: cover;
}

.product-details {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.product-img {
    flex: 1 1 300px;
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.product-info {
    flex: 1 1 300px;
}

.close {
    position: absolute;
    top: 15px;
    right: 20px;
    font-size: 28px;
    font-weight: bold;
    color: #888;
    cursor: pointer;
}

.close:hover {
    color: #000;
}

</style>



