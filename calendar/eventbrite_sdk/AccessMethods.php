<?php

namespace Eventbrite;

// Access methods.  This file could be auto-generated.

class AccessMethods
{

/**
* get_categories
* GET /categories/
*        Returns a list of :format:`category` as ``categories``, including
*        subcategories nested.
*/
public function get_categories($expand=array()) {
    return $this->get(sprintf("/categories/"), $expand=$expand);
}


/**
* get_category
* GET /categories/:id/
*        Gets a :format:`category` by ID as ``category``.
*/
public function get_category($id, $expand=array()) {
    return $this->get(sprintf("/categories/%s/", $id), $expand=$expand);
}


/**
* get_subcategories
* GET /subcategories/
*        Returns a list of :format:`subcategory` as ``subcategories``.
*/
public function get_subcategories($expand=array()) {
    return $this->get(sprintf("/subcategories/"), $expand=$expand);
}


/**
* get_subcategory
* GET /subcategories/:id/
*        Gets a :format:`subcategory` by ID as ``subcategory``.
*/
public function get_subcategory($id, $expand=array()) {
    return $this->get(sprintf("/subcategories/%s/", $id), $expand=$expand);
}


/**
* get_event_search
* GET /events/search/
*        Allows you to retrieve a paginated response of public :format:`event` objects from across Eventbrite’s directory, regardless of which user owns the event.
*/
public function get_event_search($expand=array()) {
    return $this->get(sprintf("/events/search"), $expand=$expand);
}


/**
* post_events
* POST /events/
*        Makes a new event, and returns an :format:`event` for the specified event. Does not support the creation of repeating
*        event series.
*        field event.venue_id
*        The ID of a previously-created venue to associate with this event.
*        You can omit this field or set it to ``null`` if you set ``online_event``.
*/
public function post_events($data=array()) {
    return $this->post(sprintf("/events/"), $data=$data);
}


/**
* get_event
* GET /events/:id/
*        Returns an :format:`event` for the specified event. Many of Eventbrite’s API use cases revolve around pulling details
*        of a specific event within an Eventbrite account. Does not support fetching a repeating event series parent
*        (see :ref:`get-series-by-id`).
*/
public function get_event($id, $expand=array()) {
    return $this->get(sprintf("/events/%s/", $id), $expand=$expand);
}


/**
* post_event
* POST /events/:id/
*        Updates an event. Returns an :format:`event` for the specified event. Does not support updating a repeating event
*        series parent (see POST /series/:id/).
*/
public function post_event($id, $data=array()) {
    return $this->post(sprintf("/events/%s/", $id), $data=$data);
}


/**
* post_event_publish
* POST /events/:id/publish/
*        Publishes an event if it has not already been deleted. In order for publish to be permitted, the event must have all
*        necessary information, including a name and description, an organizer, at least one ticket, and valid payment options.
*        This API endpoint will return argument errors for event fields that fail to validate the publish requirements. Returns
*        a boolean indicating success or failure of the publish.
*        field_error event.name MISSING
*        Your event must have a name to be published.
*        field_error event.start MISSING
*        Your event must have a start date to be published.
*        field_error event.end MISSING
*        Your event must have an end date to be published.
*        field_error event.start.timezone MISSING
*        Your event start and end dates must have matching time zones to be published.
*        field_error event.organizer MISSING
*        Your event must have an organizer to be published.
*        field_error event.currency MISSING
*        Your event must have a currency to be published.
*        field_error event.currency INVALID
*        Your event must have a valid currency to be published.
*        field_error event.tickets MISSING
*        Your event must have at least one ticket to be published.
*        field_error event.tickets.N.name MISSING
*        All tickets must have names in order for your event to be published. The N will be the ticket class ID with the
*        error.
*        field_error event.tickets.N.quantity_total MISSING
*        All non-donation tickets must have an available quantity value in order for your event to be published. The N
*        will be the ticket class ID with the error.
*        field_error event.tickets.N.cost MISSING
*        All non-donation tickets must have a cost (which can be ``0.00`` for free tickets) in order for your event to
*        be published. The N will be the ticket class ID with the error.
*/
public function post_event_publish($id, $data=array()) {
    return $this->post(sprintf("/events/%s/publish/", $id), $data=$data);
}


/**
* post_event_unpublish
* POST /events/:id/unpublish/
*        Unpublishes an event. In order for a free event to be unpublished, it must not have any pending or completed orders,
*        even if the event is in the past. In order for a paid event to be unpublished, it must not have any pending or completed
*        orders, unless the event has been completed and paid out. Returns a boolean indicating success or failure of the
*        unpublish.
*/
public function post_event_unpublish($id, $data=array()) {
    return $this->post(sprintf("/events/%s/unpublish/", $id), $data=$data);
}


/**
* post_event_cancel
* POST /events/:id/cancel/
*        Cancels an event if it has not already been deleted. In order for cancel to be permitted, there must be no pending or
*        completed orders. Returns a boolean indicating success or failure of the cancel.
*/
public function post_event_cancel($id, $data=array()) {
    return $this->post(sprintf("/events/%s/cancel/", $id), $data=$data);
}


/**
* delete_event
* DELETE /events/:id/
*        Deletes an event if the delete is permitted. In order for a delete to be permitted, there must be no pending or
*        completed orders. Returns a boolean indicating success or failure of the delete.
*/
public function delete_event($id, $data=array()) {
    return $this->delete(sprintf("/events/%s/", $id), $data=$data);
}


/**
* get_event_display_settings
* GET /events/:id/display_settings/
*        Retrieves the display settings for an event.
*/
public function get_event_display_settings($id, $expand=array()) {
    return $this->get(sprintf("/events/%s/display_settings/", $id), $expand=$expand);
}


/**
* post_event_display_settings
* POST /events/:id/display_settings/
*        Updates the display settings for an event.
*/
public function post_event_display_settings($id, $data=array()) {
    return $this->post(sprintf("/events/%s/display_settings/", $id), $data=$data);
}


/**
* get_event_ticket_classes
* GET /events/:id/ticket_classes/
*        Returns a :ref:`paginated <pagination>` response with a key of
*        ``ticket_classes``, containing a list of :format:`ticket_class`.
*/
public function get_event_ticket_classes($id, $expand=array()) {
    return $this->get(sprintf("/events/%s/ticket_classes/", $id), $expand=$expand);
}


/**
* post_event_ticket_classes
* POST /events/:id/ticket_classes/
*        Creates a new ticket class, returning the result as a :format:`ticket_class`
*        under the key ``ticket_class``.
*/
public function post_event_ticket_classes($id, $data=array()) {
    return $this->post(sprintf("/events/%s/ticket_classes/", $id), $data=$data);
}


/**
* get_event_ticket_class
* GET /events/:id/ticket_classes/:ticket_class_id/
*        Gets and returns a single :format:`ticket_class` by ID, as the key
*        ``ticket_class``.
*/
public function get_event_ticket_class($id, $ticket_class_id, $expand=array()) {
    return $this->get(sprintf("/events/%s/ticket_classes/%s/", $id, $ticket_class_id), $expand=$expand);
}


/**
* post_event_ticket_class
* POST /events/:id/ticket_classes/:ticket_class_id/
*        Updates an existing ticket class, returning the updated result as a :format:`ticket_class` under the key ``ticket_class``.
*/
public function post_event_ticket_class($id, $ticket_class_id, $data=array()) {
    return $this->post(sprintf("/events/%s/ticket_classes/%s/", $id, $ticket_class_id), $data=$data);
}


/**
* delete_event_ticket_class
* DELETE /events/:id/ticket_classes/:ticket_class_id/
*        Deletes the ticket class. Returns ``{"deleted": true}``.
*/
public function delete_event_ticket_class($id, $ticket_class_id, $data=array()) {
    return $this->delete(sprintf("/events/%s/ticket_classes/%s/", $id, $ticket_class_id), $data=$data);
}


/**
* get_event_canned_questions
* GET /events/:id/canned_questions/
*        This endpoint returns canned questions of a single event (examples: first name, last name, company, prefix, etc.). This endpoint will return :format:`question`.
*/
public function get_event_canned_questions($id, $expand=array()) {
    return $this->get(sprintf("/events/%s/canned_questions/", $id), $expand=$expand);
}


/**
* get_event_questions
* GET /events/:id/questions/
*        Eventbrite allows event organizers to add custom questions that attendees fill
*        out upon registration. This endpoint can be helpful for determining what
*        custom information is collected and available per event.
*        This endpoint will return :format:`question`.
*/
public function get_event_questions($id, $expand=array()) {
    return $this->get(sprintf("/events/%s/questions/", $id), $expand=$expand);
}


/**
* get_event_question
* GET /events/:id/questions/:question_id/
*        This endpoint will return :format:`question` for a specific question id.
*/
public function get_event_question($id, $question_id, $expand=array()) {
    return $this->get(sprintf("/events/%s/questions/%s/", $id, $question_id), $expand=$expand);
}


/**
* get_event_attendees
* GET /events/:id/attendees/
*        Returns a :ref:`paginated <pagination>` response with a key of ``attendees``, containing a list of :format:`attendee`.
*/
public function get_event_attendees($id, $expand=array()) {
    return $this->get(sprintf("/events/%s/attendees/", $id), $expand=$expand);
}


/**
* get_event_attendee
* GET /events/:id/attendees/:attendee_id/
*        Returns a single :format:`attendee` by ID, as the key ``attendee``.
*/
public function get_event_attendee($id, $attendee_id, $expand=array()) {
    return $this->get(sprintf("/events/%s/attendees/%s/", $id, $attendee_id), $expand=$expand);
}


/**
* get_event_orders
* GET /events/:id/orders/
*        Returns a :ref:`paginated <pagination>` response with a key of ``orders``, containing a list of :format:`order` against this event.
*/
public function get_event_orders($id, $expand=array()) {
    return $this->get(sprintf("/events/%s/orders/", $id), $expand=$expand);
}


/**
* get_event_discounts
* GET /events/:id/discounts/
*        Returns a :ref:`paginated <pagination>` response with a key of ``discounts``,
*        containing a list of :format:`discounts <discount>` available on this event.
*        field_error event_id NOT_FOUND
*        The event id you are attempting to use does not exist.
*/
public function get_event_discounts($id, $expand=array()) {
    return $this->get(sprintf("/events/%s/discounts/", $id), $expand=$expand);
}


/**
* post_event_discounts
* POST /events/:id/discounts/
*        Creates a new discount; returns the result as a :format:`discount` as the key ``discount``.
*/
public function post_event_discounts($id, $data=array()) {
    return $this->post(sprintf("/events/%s/discounts/", $id), $data=$data);
}


/**
* get_event_discount
* GET /events/:id/discounts/:discount_id/
*        Gets a :format:`discount` by ID as the key ``discount``.
*/
public function get_event_discount($id, $discount_id, $expand=array()) {
    return $this->get(sprintf("/events/%s/discounts/%s/", $id, $discount_id), $expand=$expand);
}


/**
* post_event_discount
* POST /events/:id/discounts/:discount_id/
*        Updates a discount; returns the result as a :format:`discount` as the key ``discount``.
*/
public function post_event_discount($id, $discount_id, $data=array()) {
    return $this->post(sprintf("/events/%s/discounts/%s/", $id, $discount_id), $data=$data);
}


/**
* get_event_public_discounts
* GET /events/:id/public_discounts/
*        Returns a :ref:`paginated <pagination>` response with a key of ``discounts``, containing a list of public :format:`discounts <discount>` available on this event.
*        Note that public discounts and discounts have exactly the same form and structure; they're just namespaced separately, and public ones (and the public GET endpoints) are visible to anyone who can see the event.
*/
public function get_event_public_discounts($id, $expand=array()) {
    return $this->get(sprintf("/events/%s/public_discounts/", $id), $expand=$expand);
}


/**
* post_event_public_discounts
* POST /events/:id/public_discounts/
*        Creates a new public discount; returns the result as a :format:`discount` as the key ``discount``.
*/
public function post_event_public_discounts($id, $data=array()) {
    return $this->post(sprintf("/events/%s/public_discounts/", $id), $data=$data);
}


/**
* get_event_public_discount
* GET /events/:id/public_discounts/:discount_id/
*        Gets a public :format:`discount` by ID as the key ``discount``.
*/
public function get_event_public_discount($id, $discount_id, $expand=array()) {
    return $this->get(sprintf("/events/%s/public_discounts/%s/", $id, $discount_id), $expand=$expand);
}


/**
* post_event_public_discount
* POST /events/:id/public_discounts/:discount_id/
*        Updates a public discount; returns the result as a :format:`discount` as the key ``discount``.
*/
public function post_event_public_discount($id, $discount_id, $data=array()) {
    return $this->post(sprintf("/events/%s/public_discounts/%s/", $id, $discount_id), $data=$data);
}


/**
* delete_event_public_discount
* DELETE /events/:id/public_discounts/:discount_id/
*        Deletes a public discount.
*/
public function delete_event_public_discount($id, $discount_id, $data=array()) {
    return $this->delete(sprintf("/events/%s/public_discounts/%s/", $id, $discount_id), $data=$data);
}


/**
* get_event_access_codes
* GET /events/:id/access_codes/
*        Returns a :ref:`paginated <pagination>` response with a key of ``access_codes``, containing a list of :format:`access_codes <access_code>` available on this event.
*/
public function get_event_access_codes($id, $expand=array()) {
    return $this->get(sprintf("/events/%s/access_codes/", $id), $expand=$expand);
}


/**
* post_event_access_codes
* POST /events/:id/access_codes/
*        Creates a new access code; returns the result as a :format:`access_code` as the key ``access_code``.
*/
public function post_event_access_codes($id, $data=array()) {
    return $this->post(sprintf("/events/%s/access_codes/", $id), $data=$data);
}


/**
* get_event_access_code
* GET /events/:id/access_codes/:access_code_id/
*        Gets a :format:`access_code` by ID as the key ``access_code``.
*/
public function get_event_access_code($id, $access_code_id, $expand=array()) {
    return $this->get(sprintf("/events/%s/access_codes/%s/", $id, $access_code_id), $expand=$expand);
}


/**
* post_event_access_code
* POST /events/:id/access_codes/:access_code_id/
*        Updates an access code; returns the result as a :format:`access_code` as the
*        key ``access_code``.
*/
public function post_event_access_code($id, $access_code_id, $data=array()) {
    return $this->post(sprintf("/events/%s/access_codes/%s/", $id, $access_code_id), $data=$data);
}


/**
* get_event_transfers
* GET /events/:id/transfers/
*        Returns a list of :format:`transfers` for the event.
*/
public function get_event_transfers($id, $expand=array()) {
    return $this->get(sprintf("/events/%s/transfers/", $id), $expand=$expand);
}


/**
* get_event_teams
* GET /events/:id/teams/
*        Returns a list of :format:`teams` for the event.
*/
public function get_event_teams($id, $expand=array()) {
    return $this->get(sprintf("/events/%s/teams/", $id), $expand=$expand);
}


/**
* get_event_team
* GET /events/:id/teams/:team_id/
*        Returns information for a single :format:`teams`.
*/
public function get_event_team($id, $team_id, $expand=array()) {
    return $this->get(sprintf("/events/%s/teams/%s/", $id, $team_id), $expand=$expand);
}


/**
* get_event_teams_attendees
* GET /events/:id/teams/:team_id/attendees/
*        Returns :format:`attendees` for a single :format:`teams`.
*/
public function get_event_teams_attendees($id, $team_id, $expand=array()) {
    return $this->get(sprintf("/events/%s/teams/%s/attendees/", $id, $team_id), $expand=$expand);
}


/**
* post_series
* POST /series/
*        Creates a new repeating event series. The POST data must include information for at least one event date in the series.
*        .. _get-series-by-id:
*/
public function post_series($data=array()) {
    return $this->post(sprintf("/series/"), $data=$data);
}


/**
* get_one_series
* GET /series/:id/
*        Returns a repeating event series parent object for the specified repeating event series.
*        .. _post-series-by-id:
*/
public function get_one_series($id, $expand=array()) {
    return $this->get(sprintf("/series/%s/", $id), $expand=$expand);
}


/**
* post_one_series
* POST /series/:id/
*        Updates a repeating event series parent object, and optionally also creates more event dates or updates or deletes
*        existing event dates in the series. In order for a series date to be deleted or updated, there must be no pending or
*        completed orders for that date.
*        .. _publish-series-by-id:
*/
public function post_one_series($id, $data=array()) {
    return $this->post(sprintf("/series/%s/", $id), $data=$data);
}


/**
* post_series_publish
* POST /series/:id/publish/
*        Publishes a repeating event series and all of its occurrences that are not already canceled or deleted. Once a date is cancelled it can still be uncancelled and can be viewed by the public. A deleted date cannot be undeleted and cannot by viewed by the public. In order for
*        publish to be permitted, the event must have all necessary information, including a name and description, an organizer,
*        at least one ticket, and valid payment options. This API endpoint will return argument errors for event fields that
*        fail to validate the publish requirements. Returns a boolean indicating success or failure of the publish.
*        field_error event.name MISSING
*        Your event must have a name to be published.
*        field_error event.start MISSING
*        Your event must have a start date to be published.
*        field_error event.end MISSING
*        Your event must have an end date to be published.
*        field_error event.start.timezone MISSING
*        Your event start and end dates must have matching time zones to be published.
*        field_error event.organizer MISSING
*        Your event must have an organizer to be published.
*        field_error event.currency MISSING
*        Your event must have a currency to be published.
*        field_error event.currency INVALID
*        Your event must have a valid currency to be published.
*        field_error event.tickets MISSING
*        Your event must have at least one ticket to be published.
*        field_error event.tickets.N.name MISSING
*        All tickets must have names in order for your event to be published. The N will be the ticket class ID with the
*        error.
*        field_error event.tickets.N.quantity_total MISSING
*        All non-donation tickets must have an available quantity value in order for your event to be published. The N
*        will be the ticket class ID with the error.
*        field_error event.tickets.N.cost MISSING
*        All non-donation tickets must have a cost (which can be ``0.00`` for free tickets) in order for your event to
*        be published. The N will be the ticket class ID with the error.
*        .. _unpublish-series-by-id:
*/
public function post_series_publish($id, $data=array()) {
    return $this->post(sprintf("/series/%s/publish/", $id), $data=$data);
}


/**
* post_series_unpublish
* POST /series/:id/unpublish/
*        Unpublishes a repeating event series and all of its occurrences that are not already completed, canceled, or deleted. In
*        order for a free series to be unpublished, it must not have any pending or completed orders for any dates, even past
*        dates. In order for a paid series to be unpublished, it must not have any pending or completed orders for any dates,
*        except that completed orders for past dates that have been completed and paid out do not prevent an unpublish. Returns
*        a boolean indicating success or failure of the unpublish.
*        .. _cancel-series-by-id:
*/
public function post_series_unpublish($id, $data=array()) {
    return $this->post(sprintf("/series/%s/unpublish/", $id), $data=$data);
}


/**
* post_series_cancel
* POST /series/:id/cancel/
*        Cancels a repeating event series and all of its occurrences that are not already canceled or deleted. In order for
*        cancel to be permitted, there must be no pending or completed orders for any dates in the series. Returns a boolean
*        indicating success or failure of the cancel.
*        .. _delete-series-by-id:
*/
public function post_series_cancel($id, $data=array()) {
    return $this->post(sprintf("/series/%s/cancel/", $id), $data=$data);
}


/**
* delete_one_series
* DELETE /series/:id/
*        Deletes a repeating event series and all of its occurrences if the delete is permitted. In order for a delete to be
*        permitted, there must be no pending or completed orders for any dates in the series. Returns a boolean indicating
*        success or failure of the delete.
*        .. _get-series-events:
*/
public function delete_one_series($id, $data=array()) {
    return $this->delete(sprintf("/series/%s/", $id), $data=$data);
}


/**
* get_series_events
* GET /series/:id/events/
*        Returns all of the events that belong to this repeating event series.
*        .. _post-series-dates:
*/
public function get_series_events($id, $expand=array()) {
    return $this->get(sprintf("/series/%s/events/", $id), $expand=$expand);
}


/**
* post_series_events
* POST /series/:id/events/
*        Creates more event dates or updates or deletes existing event dates in a repeating event series. In order for a series
*        date to be deleted or updated, there must be no pending or completed orders for that date.
*/
public function post_series_events($id, $data=array()) {
    return $this->post(sprintf("/series/%s/events/", $id), $data=$data);
}


/**
* get_formatss
* GET /formats/
*        Returns a list of :format:`format` as ``formats``.
*/
public function get_formatss($expand=array()) {
    return $this->get(sprintf("/formats/"), $expand=$expand);
}


/**
* get_formats
* GET /formats/:id/
*        Gets a :format:`format` by ID as ``format``.*/
public function get_formats($id, $expand=array()) {
    return $this->get(sprintf("/formats/%s/", $id), $expand=$expand);
}


/**
* get_media
* GET /media/:id/
*        Return an :format:`image` for a given id.
*        .. _get-media-upload:
*/
public function get_media($id, $expand=array()) {
    return $this->get(sprintf("/media/%s/", $id), $expand=$expand);
}


/**
* get_media_upload
* GET /media/upload/
*        See :ref:`media-uploads`.
*        .. _post-media-upload:
*/
public function get_media_upload($expand=array()) {
    return $this->get(sprintf("/media/upload/"), $expand=$expand);
}


/**
* post_media_upload
* POST /media/upload/
*        See :ref:`media-uploads`.*/
public function post_media_upload($data=array()) {
    return $this->post(sprintf("/media/upload/"), $data=$data);
}


/**
* get_order
* GET /orders/:id/
*        Gets an :format:`order` by ID as the key ``order``.
*/
public function get_order($id, $expand=array()) {
    return $this->get(sprintf("/orders/%s/", $id), $expand=$expand);
}


/**
* post_organizers
* POST /organizers/
*        Makes a new organizer. Returns an :format:`organizer` as ``organizer``.
*        field_error organizer.name DUPLICATE
*        You already have another organizer with this name.
*        field_error organizer.short_name UNAVAILABLE
*        There is already another organizer or event with this short name.
*        field_error organizer.logo_id INVALID
*        This is not a valid image.
*        field_error organizer.facebook INVALID
*        This is not a valid Facebook profile URL.
*        field_error organizer.facebook NO_GROUP_PAGES
*        The Facebook URL cannot be a group page.
*/
public function post_organizers($data=array()) {
    return $this->post(sprintf("/organizers/"), $data=$data);
}


/**
* get_organizer
* GET /organizers/:id/
*        Gets an :format:`organizer` by ID as ``organizer``.
*/
public function get_organizer($id, $expand=array()) {
    return $this->get(sprintf("/organizers/%s/", $id), $expand=$expand);
}


/**
* post_organizer
* POST /organizers/:id/
*        Updates an :format:`organizer` and returns it as as ``organizer``.
*        field_error organizer.name DUPLICATE
*        You already have another organizer with this name.
*        field_error organizer.short_name UNAVAILABLE
*        There is already another organizer or event with this short name.
*        field_error organizer.logo_id INVALID
*        This is not a valid image.
*        field_error organizer.facebook INVALID
*        This is not a valid Facebook profile URL.
*        field_error organizer.facebook NO_GROUP_PAGES
*        The Facebook URL cannot be a group page.
*/
public function post_organizer($id, $data=array()) {
    return $this->post(sprintf("/organizers/%s/", $id), $data=$data);
}


/**
* get_organizers_events
* GET /organizers/:id/events/
*        Gets events of the :format:`organizer`.
*/
public function get_organizers_events($id, $expand=array()) {
    return $this->get(sprintf("/organizers/%s/events/", $id), $expand=$expand);
}


/**
* get_refund_request
* GET /refund_requests/:id/
*        Gets a :format:`refund-request` for the specified refund request.
*        error NOT_AUTHORIZED
*        Only the order's buyer can create a refund request
*        error FIELD_UNKNOWN
*        The refund request id provided is unknown
*/
public function get_refund_request($id, $expand=array()) {
    return $this->get(sprintf("/refund_requests/%s/", $id), $expand=$expand);
}


/**
* post_refund_request
* POST /refund_requests/:id/
*        Update a :format:`refund-request` for a specific order. Each element in items is a :format:`refund-item`
*        error NOT_AUTHORIZED
*        Only the order's buyer can create a refund request
*        error FIELD_UNKNOWN
*        The refund request id provided is unknown
*        error INVALID_REFUND_REQUEST_STATUS
*        The refund request is not the correct status for the change
*/
public function post_refund_request($id, $data=array()) {
    return $this->post(sprintf("/refund_requests/%s/", $id), $data=$data);
}


/**
* post_refund_requests
* POST /refund_requests/
*        Creates a :format:`refund-request` for a specific order. Each element in items is a :format:`refund-item`
*        error NOT_AUTHORIZED
*        Only the order's buyer can create a refund request
*        error FIELD_UNKNOWN
*        The order id provided is unknown
*        error EVENT_DOES_NOT_ALLOW_REFUND_REQUESTS
*        According to organizer definition, the event does not allow the creation of refund requests.
*        error EXISTING_REFUND_REQUEST_FOR_ORDER
*        The order already has a refund request
*        error INVALID_ORDER_STATE
*        The order status is not allowed to request a refund. It must be placed.*/
public function post_refund_requests($data=array()) {
    return $this->post(sprintf("/refund_requests/"), $data=$data);
}


/**
* get_reports_sales
* GET /reports/sales/
*        Returns a response of the aggregate sales data.
*/
public function get_reports_sales($expand=array()) {
    return $this->get(sprintf("/reports/sales/"), $expand=$expand);
}


/**
* get_reports_attendees
* GET /reports/attendees/
*        Returns a response of the aggregate attendees data.
*/
public function get_reports_attendees($expand=array()) {
    return $this->get(sprintf("/reports/attendees/"), $expand=$expand);
}


/**
* get_system_timezones
* GET /system/timezones/
*        Returns a :ref:`paginated <pagination>` response with a key of ``timezones``,
*        containing a list of :format:`timezones <timezone>`.
*/
public function get_system_timezones($expand=array()) {
    return $this->get(sprintf("/system/timezones/"), $expand=$expand);
}


/**
* get_system_regions
* GET /system/regions/
*        Returns a single page response with a key of ``regions``,
*        containing a list of :format:`regions`.
*/
public function get_system_regions($expand=array()) {
    return $this->get(sprintf("/system/regions/"), $expand=$expand);
}


/**
* get_system_countries
* GET /system/countries/
*        Returns a single page response with a key of ``countries``,
*        containing a list of :format:`countries`.
*/
public function get_system_countries($expand=array()) {
    return $this->get(sprintf("/system/countries/"), $expand=$expand);
}


/**
* post_tracking_beacons
* POST /tracking_beacons/
*        Makes a new tracking beacon. Returns an :format:`tracking_beacon` as ``tracking_beacon``. Either ``event_id`` or ``user_id`` is required for each tracking beacon. If the ``event_id`` is provided, the tracking pixel will fire only for that event. If the ``user_id`` is provided, the tracking pixel will fire for all events organized by that user.
*        field_error tracking_beacon.event_id INVALID
*        This is not a valid event.
*        field_error tracking_beacon.user_id INVALID
*        This is not a valid user.
*/
public function post_tracking_beacons($data=array()) {
    return $this->post(sprintf("/tracking_beacons/"), $data=$data);
}


/**
* get_tracking_beacon
* GET /tracking_beacons/:tracking_beacons_id/
*        Returns the :format:`tracking_beacon` with the specified :tracking_beacons_id.
*/
public function get_tracking_beacon($tracking_beacons_id, $expand=array()) {
    return $this->get(sprintf("/tracking_beacons/%s/", $tracking_beacons_id), $expand=$expand);
}


/**
* post_tracking_beacon
* POST /tracking_beacons/:tracking_beacons_id/
*        Updates the :format:`tracking_beacons` with the specified :tracking_beacons_id. Though ``event_id`` and ``user_id`` are not individually required, it is a requirement to have a tracking beacon where either one must exist. Returns an :format:`tracking_beacon` as ``tracking_beacon``.
*/
public function post_tracking_beacon($tracking_beacons_id, $data=array()) {
    return $this->post(sprintf("/tracking_beacons/%s/", $tracking_beacons_id), $data=$data);
}


/**
* delete_tracking_beacon
* DELETE /tracking_beacons/:tracking_beacons_id/
*        Delete the :format:`tracking_beacons` with the specified :tracking_beacons_id.
*/
public function delete_tracking_beacon($tracking_beacons_id, $data=array()) {
    return $this->delete(sprintf("/tracking_beacons/%s/", $tracking_beacons_id), $data=$data);
}


/**
* get_event_tracking_beacons
* GET /events/:event_id/tracking_beacons/
*        Returns the list of :format:`tracking_beacon` for the event :event_id
*/
public function get_event_tracking_beacons($event_id, $expand=array()) {
    return $this->get(sprintf("/events/%s/tracking_beacons/", $event_id), $expand=$expand);
}


/**
* get_user_tracking_beacons
* GET /users/:user_id/tracking_beacons/
*        Returns the list of :format:`tracking_beacon` for the user :user_id
*/
public function get_user_tracking_beacons($user_id, $expand=array()) {
    return $this->get(sprintf("/users/%s/tracking_beacons/", $user_id), $expand=$expand);
}


/**
* get_user
* GET /users/:id/
*        Returns a :format:`user` for the specified user as ``user``. If you want to get details about the currently authenticated user, use ``/users/me/``.
*/
public function get_user($id, $expand=array()) {
    return $this->get(sprintf("/users/%s/", $id), $expand=$expand);
}


/**
* get_user_orders
* GET /users/:id/orders/
*        Returns a :ref:`paginated <pagination>` response of :format:`orders <order>`, under the key ``orders``, of all orders the user has placed (i.e. where the user was the person buying the tickets).
*        :param int id: The id assigned to a user.
*        :param datetime changed_since: (optional) Only return attendees changed on or after the time given.
*        .. note:: A datetime represented as a string in ISO8601 combined date and time format, always in UTC.
*/
public function get_user_orders($id, $expand=array()) {
    return $this->get(sprintf("/users/%s/orders/", $id), $expand=$expand);
}


/**
* get_user_organizers
* GET /users/:id/organizers/
*        Returns a :ref:`paginated <pagination>` response of :format:`organizer` objects that are owned by the user.
*/
public function get_user_organizers($id, $expand=array()) {
    return $this->get(sprintf("/users/%s/organizers/", $id), $expand=$expand);
}


/**
* get_user_owned_events
* GET /users/:id/owned_events/
*        Returns a :ref:`paginated <pagination>` response of :format:`events <event>`, under
*        the key ``events``, of all events the user owns (i.e. events they are organising)
*/
public function get_user_owned_events($id, $expand=array()) {
    return $this->get(sprintf("/users/%s/owned_events/", $id), $expand=$expand);
}


/**
* get_user_events
* GET /users/:id/events/
*        Returns a :ref:`paginated <pagination>` response of :format:`events <event>`, under the key ``events``, of all events the user has access to
*/
public function get_user_events($id, $expand=array()) {
    return $this->get(sprintf("/users/%s/events/", $id), $expand=$expand);
}


/**
* get_user_venues
* GET /users/:id/venues/
*        Returns a paginated response of :format:`venue` objects that are owned by the user.
*/
public function get_user_venues($id, $expand=array()) {
    return $this->get(sprintf("/users/%s/venues/", $id), $expand=$expand);
}


/**
* get_user_owned_event_attendees
* GET /users/:id/owned_event_attendees/
*        Returns a :ref:`paginated <pagination>` response of :format:`attendees <attendee>`,
*        under the key ``attendees``, of attendees visiting any of the events the user owns
*        (events that would be returned from ``/users/:id/owned_events/``)
*/
public function get_user_owned_event_attendees($id, $expand=array()) {
    return $this->get(sprintf("/users/%s/owned_event_attendees/", $id), $expand=$expand);
}


/**
* get_user_owned_event_orders
* GET /users/:id/owned_event_orders/
*        Returns a :ref:`paginated <pagination>` response of :format:`orders <order>`,
*        under the key ``orders``, of orders placed against any of the events the user owns
*        (events that would be returned from ``/users/:id/owned_events/``)
*/
public function get_user_owned_event_orders($id, $expand=array()) {
    return $this->get(sprintf("/users/%s/owned_event_orders/", $id), $expand=$expand);
}


/**
* get_user_contact_lists
* GET /users/:id/contact_lists/
*        Returns a list of :format:`contact_list` that the user owns as the key
*        ``contact_lists``.
*/
public function get_user_contact_lists($id, $expand=array()) {
    return $this->get(sprintf("/users/%s/contact_lists/", $id), $expand=$expand);
}


/**
* post_user_contact_lists
* POST /users/:id/contact_lists/
*        Makes a new :format:`contact_list` for the user and returns it as
*        ``contact_list``.
*/
public function post_user_contact_lists($id, $data=array()) {
    return $this->post(sprintf("/users/%s/contact_lists/", $id), $data=$data);
}


/**
* get_user_contact_list
* GET /users/:id/contact_lists/:contact_list_id/
*        Gets a user's :format:`contact_list` by ID as ``contact_list``.
*/
public function get_user_contact_list($id, $contact_list_id, $expand=array()) {
    return $this->get(sprintf("/users/%s/contact_lists/%s/", $id, $contact_list_id), $expand=$expand);
}


/**
* post_user_contact_list
* POST /users/:id/contact_lists/:contact_list_id/
*        Updates the :format:`contact_list` and returns it as ``contact_list``.
*/
public function post_user_contact_list($id, $contact_list_id, $data=array()) {
    return $this->post(sprintf("/users/%s/contact_lists/%s/", $id, $contact_list_id), $data=$data);
}


/**
* delete_user_contact_list
* DELETE /users/:id/contact_lists/:contact_list_id/
*        Deletes the contact list. Returns ``{"deleted": true}``.
*/
public function delete_user_contact_list($id, $contact_list_id, $data=array()) {
    return $this->delete(sprintf("/users/%s/contact_lists/%s/", $id, $contact_list_id), $data=$data);
}


/**
* get_user_contact_lists_contacts
* GET /users/:id/contact_lists/:contact_list_id/contacts/
*        Returns the :format:`contacts <contact>` on the contact list
*        as ``contacts``.
*/
public function get_user_contact_lists_contacts($id, $contact_list_id, $expand=array()) {
    return $this->get(sprintf("/users/%s/contact_lists/%s/contacts/", $id, $contact_list_id), $expand=$expand);
}


/**
* post_user_contact_lists_contacts
* POST /users/:id/contact_lists/:contact_list_id/contacts/
*        Adds a new contact to the contact list. Returns ``{"created": true}``.
*        There is no way to update entries in the list; just delete the old one
*        and add the updated version.
*/
public function post_user_contact_lists_contacts($id, $contact_list_id, $data=array()) {
    return $this->post(sprintf("/users/%s/contact_lists/%s/contacts/", $id, $contact_list_id), $data=$data);
}


/**
* delete_user_contact_lists_contacts
* DELETE /users/:id/contact_lists/:contact_list_id/contacts/
*        Deletes the specified contact from the contact list.
*        Returns ``{"deleted": true}``.
=======
*/
public function delete_user_contact_lists_contacts($id, $contact_list_id, $data=array()) {
    return $this->delete(sprintf("/users/%s/contact_lists/%s/contacts/", $id, $contact_list_id), $data=$data);
}


/**
* get_user_bookmarks
* GET /users/:id/bookmarks/
*        Gets all the user's saved events.
*        In order to update the saved events list, the user must unsave or save each event.
*        A user is authorized to only see his/her saved events.
*/
public function get_user_bookmarks($id, $expand=array()) {
    return $this->get(sprintf("/users/%s/bookmarks/", $id), $expand=$expand);
}


/**
* post_user_bookmarks_save
* POST /users/:id/bookmarks/save/
*        Adds a new bookmark for the user. Returns ``{"created": true}``.
*        A user is only authorized to save his/her own events.
*/
public function post_user_bookmarks_save($id, $data=array()) {
    return $this->post(sprintf("/users/%s/bookmarks/save/", $id), $data=$data);
}


/**
* post_user_bookmarks_unsave
* POST /users/:id/bookmarks/unsave/
*        Removes the specified bookmark from the event for the user. Returns ``{"deleted": true}``.
*        A user is only authorized to unsave his/her own events.
*        error NOT_AUTHORIZED
*        You are not authorized to unsave an event for this user.
*        error ARGUMENTS_ERROR
*        There are errors with your arguments.
*/
public function post_user_bookmarks_unsave($id, $data=array()) {
    return $this->post(sprintf("/users/%s/bookmarks/unsave/", $id), $data=$data);
}


/**
* get_venue
* GET /venues/:id/
*        Returns a :format:`venue` object.
*/
public function get_venue($id, $expand=array()) {
    return $this->get(sprintf("/venues/%s/", $id), $expand=$expand);
}


/**
* post_venue
* POST /venues/:id/
*        Updates a :format:`venue` and returns it as an object.
*/
public function post_venue($id, $data=array()) {
    return $this->post(sprintf("/venues/%s/", $id), $data=$data);
}


/**
* post_venues
* POST /venues/
*        Creates a new :format:`venue` with associated :format:`address`.
*        ..start-internal
*/
public function post_venues($data=array()) {
    return $this->post(sprintf("/venues/"), $data=$data);
}


/**
* get_venues_search
* GET /venues/search/
*        Search for venues. Returns a list of venue objects.
*        ..end-internal
*/
public function get_venues_search($expand=array()) {
    return $this->get(sprintf("/venues/search/"), $expand=$expand);
}


/**
* get_venues_events
* GET /venues/:id/events/
*        Returns events of a given :format:`venue`.
*/
public function get_venues_events($id, $expand=array()) {
    return $this->get(sprintf("/venues/%s/events/", $id), $expand=$expand);
}


/**
* get_webhook
* GET /webhooks/:id/
*        Returns a :format:`webhook` for the specified webhook as ``webhook``.
*/
public function get_webhook($id, $expand=array()) {
    return $this->get(sprintf("/webhooks/%s/", $id), $expand=$expand);
}


/**
* delete_webhook
* DELETE /webhooks/:id/
*        Deletes the specified :format:`webhook` object.
*/
public function delete_webhook($id, $data=array()) {
    return $this->delete(sprintf("/webhooks/%s/", $id), $data=$data);
}


/**
* get_webhooks
* GET /webhooks/
*        Returns the list of :format:`webhook` objects that belong to the authenticated user.
*/
public function get_webhooks($expand=array()) {
    return $this->get(sprintf("/webhooks/"), $expand=$expand);
}


/**
* post_webhooks
* POST /webhooks/
*        Creates a :format:`webhook` for the authenticated user.
*        The ``actions`` parameter accepts a comma-separated value that can include any or all of the following:
*        * ``attendee.checked_in`` - Triggered when an attendee's barcode is scanned in.
*        * ``attendee.checked_out`` - Triggered when an attendee's barcode is scanned out.
*        * ``attendee.updated`` - Triggered when attendee data is updated.
*        * ``event.created`` - Triggered when an event is initially created.
*        * ``event.published`` - Triggered when an event is published and made live.
*        * ``event.updated`` - Triggered when event data is updated.
*        * ``event.unpublished`` - Triggered when an event is unpublished.
*        * ``order.placed`` - Triggers when an order is placed for an event. Generated Webhook's API endpoint is to the Order endpoint.
*        * ``order.refunded`` - Triggers when an order is refunded for an event.
*        * ``order.updated`` - Triggers when order data is updated for an event.
*        * ``organizer.updated`` - Triggers when organizer data is updated.
*        * ``ticket_class.created`` - Triggers when a ticket class is created.
*        * ``ticket_class.deleted`` - Triggers when a ticket class is deleted.
*        * ``ticket_class.updated`` - Triggers when a ticket class is updated.
*        * ``venue.updated`` - Triggers when venue data is updated.*/
public function post_webhooks($data=array()) {
    return $this->post(sprintf("/webhooks/"), $data=$data);
}


}
?>
